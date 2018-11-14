PHP client SmartCAT API 
==============
[![Latest Version](https://img.shields.io/github/release/smartcatai/SmartCAT-API.svg?style=flat-square)](https://img.shields.io/github/release/smartcatai/SmartCAT-API.svg?style=flat-square)
[![Software License](https://img.shields.io/github/license/smartcatai/SmartCAT-API.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/smartcat/smartcat-api.svg?style=flat-square)](https://packagist.org/packages/smartcat/smartcat-api)

[PHP client SmartCAT API](https://smartcat.ai/api/methods/)

## How to use:
 1. Install [composer](https://getcomposer.org/)
 2. composer require smartcat/smartcat-api
 3. composer install 

 [Use Case](https://www.smartcat.ai/api/docs/)

```php 
use SmartCat\Client\SmartCAT;

$sc=new SmartCAT($login, $password);
```

## [Account](https://smartcat.ai/api/methods/#!/Account/Account_GetAccountInfo)
 [Gets the account details](https://smartcat.ai/api/methods/#!/Account/Account_GetAccountInfo)    
 **GET** /api/integration/v1/account   
 ```php
 $sc->getAccountManager()->accountGetAccountInfo();
 ```

  [Gets MT engines available for the account](https://smartcat.ai/api/methods/#!/Account/Account_GetMTEnginesForAccount)    
  **GET** /api/integration/v1/account/mtengines   
  ```php
  $sc->getAccountManager()->accountGetMTEnginesForAccount();
  ```

  Gets LSP's services available for the account](https://smartcat.ai/api/methods/#!/Account/Account_GetLSPServicesForAccount)    
  **GET** /api/integration/v1/account/lsp/services   
  ```php
  $sc->getAccountManager()->accountGetLSPServicesForAccount();
  ```
 
  [Gets available assignees (MyTeam freelancers or internal account users)](https://smartcat.ai/api/methods/#!/Account/Account_GetAssignableExecutives)    
  **GET** /api/integration/v1/account/assignableExecutives  
  ```php
  $sc->getAccountManager()->accountGetAssignableExecutives();
  ```

## [Callback](https://smartcat.ai/api/methods/#!/Callback)
 [Reset configurations of notifications reception](https://smartcat.ai/api/methods/#!/Callback/Callback_Delete)
 **DELETE** /api/integration/v1/callback  
 ```php
 $sc->getCallbackManager()->callbackDelete()
 ```
 
 [Reading configurations of notifications reception of the account](https://smartcat.ai/api/methods/#!/Callback/Callback_Get)
 **GET** /api/integration/v1/callback  
 ```php
 $sc->getCallbackManager()->callbackGet()
 ```
 
 [Creating and updating configurations of notifications reception](https://smartcat.ai/api/methods/#!/Callback/Callback_Update)
 **POST** /api/integration/v1/callback  
 ```php
 $callback=new CallbackPropertyModel();
 $callback->setUrl('https://smartcat.ai');
 $res=$sc->getCallbackManager()->callbackUpdate($callback);
 ```
 
 [Reading the last sending errors (no more than 100)](https://smartcat.ai/api/methods/#!/Callback/Callback_GetLastErrors)
 **GET** /api/integration/v1/callback/lastErrors  
 ```php
 $sc->getCallbackManager()->callbackGetLastErrors(['limit'=>$limit])
 ```

## [Client](https://smartcat.ai/api/methods/#!/Client)
 [Creates a client with the specified name and returns the Id](https://smartcat.ai/api/methods/#!/Client/Client_CreateClient)  
 If the client already exists, just returns the Id.    
 **POST** /api/integration/v1/client/create
 ```php
$clientId = $sc->getClientManager()->clientCreateClient('Test client');
 ```

 [Get details on a client specified within an account](https://smartcat.ai/api/methods/#!/Client/Client_GetClient)  
 **GET** /api/integration/v1/client/{clientId}
 ```php
$client = $sc->getClientManager()->clientGetClient($clientId);
 ```

 [Sets the specified net rate model for the specified customer](https://smartcat.ai/api/methods/#!/Client/Client_SetClientNetRate)  
 **PUT** /api/integration/v1/client/{clientId}/set
 ```php
$client = $sc->getClientManager()->clientSetClientNetRate($clientId, ['netRateId' => $netRateId]);
 ```

## [Directories](https://smartcat.ai/api/methods/#!/Directories)
 [Receive the specified directory](https://smartcat.ai/api/methods/#!/Directories/Directories_Get)
 **GET** /api/integration/v1/directory  
 ```php
 $sc->getDirectoriesManager()->directoriesGet(['type'=>'projectStatus'])
 ```

 [Gets parsing formats supported by the account](https://smartcat.ai/api/methods/#!/Directories/Directories_GetSupportedFormatsForAccount)    
 **GET** /api/integration/v1/directory/formats  
 ```php
$sc->getDirectoriesManager()->directoriesGetSupportedFormatsForAccount();
 ```

## [Document](https://smartcat.ai/api/methods/#!/Document)
 [Delete one or several documents](https://smartcat.ai/api/methods/#!/Document/Document_Delete)
 **DELETE** /api/integration/v1/document  
 ```php
 $sc->getDocumentManager()->documentDelete(['documentIds'=>['id1','id2']])
 ```
 
 [Receive document model](https://smartcat.ai/api/methods/#!/Document/Document_Get)
 **GET** /api/integration/v1/document  
 ```php
 $sc->getDocumentManager()->documentGet(['documentId'=>$docId])
 ```
 
 [Update assigned document](https://smartcat.ai/api/methods/#!/Document/Document_Update)
 **PUT** /api/integration/v1/document/update
 ```php
 $bilingualFileImportSettings = new BilingualFileImportSettingsModel();
 $bilingualFileImportSettings
     ->setConfirmMode('none')
     ->setLockMode('none')
     ->setTargetSubstitutionMode('all');
 $updateDocumentModel = new UploadDocumentPropertiesModel();
 $updateDocumentModel->setBilingualFileImportSettings($bilingualFileImportSettings);
 $res = $sc->getDocumentManager()->documentUpdate([
     'documentId' => $docId,
     'updateDocumentModel' => $updateDocumentModel,
     'uploadedFile' => [
         'fileContent' => fopen(__DIR__ . '\Resources\File2_EN.docx', 'r'),
         'fileName' => 'File2_EN.docx'
     ]
 ]);
 ```
 
 [Rename assigned document](https://smartcat.ai/api/methods/#!/Document/Document_Rename)
 **PUT** /api/integration/v1/document/rename
 ```php
 $sc->getDocumentManager()->documentRename(['documentId'=>$docId,'name'=>'New file name'])
 ```
 
 [Translate indicated document using the transferred file with translations](https://smartcat.ai/api/methods/#!/Document/Document_Translate)
 **PUT** /api/integration/v1/document/translate  
 ```php
 $sc->getDocumentManager()->documentTranslate([
    'documentId'=>$docId,
    'translationFile'=>[
        'filePath'=>'file path',
        'fileName'=>'file name'
    ]
 ])
 ```

 [Импортировать xliff-файл с переводами документа](https://smartcat.ai/api/methods/#!/Document/Document_TranslateWithXliff)    
 **PUT** /api/integration/v1/document/translateWithXliff
 ```php
 $sc->getDocumentManager()->documentTranslateWithXliff([
     'documentId' => $docId,
     'confirmTranslation' => true,
     'overwriteUpdatedSegments' => true,
     'translationFile' => [
         'filePath' => 'file path',
         'fileName' => 'file.xliff'
     ]
 ]);
 ```
 
 [Receive the status of adding document translation](https://smartcat.ai/api/methods/#!/Document/Document_GetTranslationStatus)
 **GET** /api/integration/v1/document/translate/status
 ```php
 $sc->getDocumentManager()->documentGetTranslationStatus(['documentId'=>$docId])
 ```
 
 [Gets a detailed report about translation importing results](https://smartcat.ai/api/methods/#!/Document/Document_GetTranslationsImportResult)    
 **GET** /api/integration/v1/document/translate/result
 ```php
 $sc->getDocumentManager()->documentGetTranslationsImportResult(['documentId' => $docsId]);
 ```
 
 [Gets statistics](https://smartcat.ai/api/methods/#!/Document/Document_GetTranslationsImportResult)    
 **GET** /api/integration/v1/document/statistics
 ```php
 $sc->getDocumentManager()->documentGetStatistics(['documentId' => $docsId]);
 ```
 
 [Split document into equal segments according to the number of words and assign each freelancer to one segment](https://smartcat.ai/api/methods/#!/Document/Document_AssignFreelancersToDocument)
 **POST** /api/integration/v1/document/assignFreelancers  
  ```php
 $sc->getDocumentManager()->documentAssignFreelancersToDocument(
   ['Abbyyaolid1','Abbyyaolid2'], 
   [
     'documentId' => $documentId, 
     'stageNumber' => $stageNumber
   ]
 )
 ```
  
## [DocumentExport](https://smartcat.ai/api/methods/#!/DocumentExport)
 [Request document (-s) export](https://smartcat.ai/api/methods/#!/DocumentExport/DocumentExport_RequestExport)
 **POST** /api/integration/v1/document/export  
 ```php
 $sc->getDocumentExportManager()->documentExportRequestExport(['documentIds'=>['documenId1','documentId2'])
 ```
 
 [Download the results of export](https://smartcat.ai/api/methods/#!/DocumentExport/DocumentExport_DownloadExportResult)
 **GET** /api/integration/v1/document/export/{taskId}  
 ```php
 $sc->getDocumentExportManager()->documentExportDownloadExportResult($taskId);
 ```
 
## [Glossary](https://smartcat.ai/api/methods/#!/Glossary)
 [Получить набор глоссариев](https://smartcat.ai/api/methods/#!/Glossary/Glossary_GetGlossaries)    
 **GET** /api/integration/v1/glossaries  
 ```php
 $res = $sc->getGlossaryManager()->glossaryGetGlossaries();
 ```

## [Invoice](https://smartcat.ai/api/methods/#!/Invoice)
 [Creates a payable for a freelancer](https://smartcat.ai/api/methods/#!/Invoice/Invoice_ImportJob)    
 **POST** /api/integration/v1/invoice/job 
 ```php
 $importJobModel = new ImportJobModel();
 $importJobModel->setFreelancerId($freelanceId)
     ->setServiceType('translation')
     ->setJobDescription('Test invoice')
     ->setUnitsType('Any text')
     ->setUnitsAmount(10)
     ->setPricePerUnit(1)
     ->setCurrency('usd');
 $res=$sc->getInvoiceManager()->invoiceImportJob($importJobModel);
 ```

## [PlaceholderFormatApi](https://smartcat.ai/api/methods/#!/PlaceholderFormatApi)
 [Gets all placeholder formats available in the current account](https://smartcat.ai/api/methods/#!/PlaceholderFormatApi/PlaceholderFormatApi_GetPlaceholderFormats)    
 **GET** /api/integration/v1/placeholders  
 ```php
 $res = $sc->getPlaceholderFormatApiManager()->placeholderFormatApiGetPlaceholderFormats();
 ```


 [Saves a set of placeholder formats for the current account](https://smartcat.ai/api/methods/#!/PlaceholderFormatApi/PlaceholderFormatApi_UpdatePlaceholderFormats)    
 **PUT** /api/integration/v1/placeholders  
 ```php
 $placeHolder1 = new PlaceholderFormatModel();
 $placeHolder1->setRegex($regEx1);
 $placeHolder2 = new PlaceholderFormatModel();
 $placeHolder2->setRegex($regEx2);
 $res = $sc->getPlaceholderFormatApiManager()->placeholderFormatApiUpdatePlaceholderFormats([$placeHolder1, $placeHolder2]);
 ```


 [Validates the specified placeholder format](https://smartcat.ai/api/methods/#!/PlaceholderFormatApi/PlaceholderFormatApi_ValidatePlaceholderFormat)    
 **GET** /api/integration/v1/placeholders/validate   
 ```php
 $res = $this->sc->getPlaceholderFormatApiManager()->placeholderFormatApiValidatePlaceholderFormat(['format' => 'Stable\:(\s+)(.+)[\r|]\n']);
 ```

## [Project](https://smartcat.ai/api/methods/#!/Project)
 [Delete project](https://smartcat.ai/api/methods/#!/Project/Project_Delete)
 **DELETE** /api/integration/v1/project/{projectId}
 ```php
 $sc->getProjectManager()->projectDelete($projectId)
 ```
 
 [Receive project model](https://smartcat.ai/api/methods/#!/Project/Project_Get)
 **GET** /api/integration/v1/project/{projectId}
 ```php
 sc->getProjectManager()->projectGet($projectId)
 ```
 
 [Update project using ID](https://smartcat.ai/api/methods/#!/Project/Project_UpdateProject)  
 **PUT** /api/integration/v1/project/{projectId}
 
 [Receive the list of all projects in account](https://smartcat.ai/api/methods/#!/Project/Project_GetAll)
     **GET** /api/integration/v1/project/list
 ```php
 $sc->getProjectManager()->projectGetAll()
 ```
 
 [Receive statistics and project value](https://smartcat.ai/api/methods/#!/Project/Project_GetProjectStatistics)  
 **GET** /api/integration/v2/project/{projectId}/statistics  
 ```php
$sc->getProjectManager()->projectGetProjectStatistics($projectId);
do {
    sleep(5);
    $res = $sc->getProjectManager()->projectGetProjectStatistics($projectId);
} while(!is_array($res));
 ```
 
 [Receiving statistics for the completed parts of the project](https://smartcat.ai/api/methods/#!/Project/Project_GetCompletedWorkStatistics)      
 **GET** /api/integration/v1/project/{projectId}/completedWorkStatistics   
 ```php
 $res = $sc->getProjectManager()->projectGetCompletedWorkStatistics($projectId);
 ```

 [Receiving a list of the TMs plugged into the project](https://smartcat.ai/api/methods/#!/Project/Project_GetProjectTranslationMemories)      
 **GET** /api/integration/v1/project/{projectId}/translationmemories    
 ```php
 $res = $sc->getProjectManager()->projectGetProjectTranslationMemories($projectId);
 ```

 [Rewrite connected TMs — same set of TMs for all target languages](https://smartcat.ai/api/methods/#!/Project/Project_SetTranslationMemoriesForWholeProject)      
 **POST** /api/integration/v1/project/{projectId}/translationmemories    
 ```php
 $translationMemoryForProjectModel = new TranslationMemoryForProjectModel();
 $translationMemoryForProjectModel->setId($tmId);
 $translationMemoryForProjectModel->setIsWritable(true);
 $translationMemoryForProjectModel->setMatchThreshold(100);
 $res = $sc->getProjectManager()->projectSetTranslationMemoriesForWholeProject($projectId, [$translationMemoryForProjectModel]);
 ```

 [Gets a set of glossaries enabled for a project](https://smartcat.ai/api/methods/#!/Project/Project_GetGlossaries)      
 **GET** /api/integration/v1/project/{projectId}/glossaries    
 ```php
 $res = $sc->getProjectManager()->projectGetGlossaries($projectId);
 ```

 [Enables a set of glossaries for a project](https://smartcat.ai/api/methods/#!/Project/Project_SetGlossaries)      
 **PUT** /api/integration/v1/project/{projectId}/glossaries    
 ```php
 $res = $this->sc->getProjectManager()->projectSetGlossaries($projectId, [$glossaryId1, $glossaryId2]);
 ```

 [Starts generating statistics for the project](https://smartcat.ai/api/methods/#!/Project/Project_BuildStatistics)      
 **POST** /api/integration/v1/project/{projectId}/statistics/build      
 ```php
 $sc->getProjectManager()->projectBuildStatistics($this->prj->getId());
 ```

 [Rewrite connected TMs — each target language with its own set of TMs](https://smartcat.ai/api/methods/#!/Project/Project_SetTranslationMemoriesForWholeProject)      
 **POST** /api/integration/v1/project/{projectId}/translationmemories/bylanguages     
 ```php
 $translationMemoryForProjectModel = new TranslationMemoryForProjectModel();
 $translationMemoryForProjectModel->setId($tmId);
 $translationMemoryForProjectModel->setIsWritable(true);
 $translationMemoryForProjectModel->setMatchThreshold(100);
 $tm = new TranslationMemoriesForLanguageModel();
 $tm->setLanguage('en');
 $tm->setTranslationMemories([$translationMemoryForProjectModel]);
 $res = $sc->getProjectManager()->projectSetProjectTranslationMemoriesByLanguages($projectId, [$tm]);
 ```

 [Create a project](https://smartcat.ai/api/methods/#!/Project/Project_CreateProject)
 **POST** /api/integration/v1/project/create  
 ```php
 $prjCreate = new CreateProjectWithFilesModel();
 $prjCreate->setName('Test project');
 $prjCreate->setDescription('Test project');
 $prjCreate->setSourceLanguage('ru');
 $prjCreate->setTargetLanguages(['en']);
 $prjCreate->setAssignToVendor(false);
 $prjCreate->setUseMT(false);
 $prjCreate->setPretranslate(false);
 $prjCreate->setUseTranslationMemory(false);
 $prjCreate->setAutoPropagateRepetitions(false);
 $prjCreate->setIsForTesting(true);
 $prjCreate->setWorkflowStages(['translation']);
 $prjCreate->attacheFile(fopen(__DIR__.'\Resources\File1_EN.docx'),'File1_EN.docx');
 $sc->getProjectManager()->projectCreateProjectWithFiles($prjCreate);
```
  
 [Add new document to project](https://smartcat.ai/api/methods/#!/Project/Project_AddDocument)
 **POST** /api/integration/v1/project/document  
 ```php
 $bilingualFileImportSettings = new BilingualFileImportSettingsModel();
 $bilingualFileImportSettings
     ->setConfirmMode('none')
     ->setLockMode('none')
     ->setTargetSubstitutionMode('all');
 $documentModel = new CreateDocumentPropertyWithFilesModel();
 $documentModel->setBilingualFileImportSettings($bilingualFileImportSettings);
 $documentModel->attachFile(fopen(__DIR__ . '\Resources\File2_EN.docx'), 'File2_EN.docx');
 $res = $sc->getProjectManager()->projectAddDocument([
     'documentModel' => [$documentModel],
     'projectId' => $projectId
 ]);
 ```
 Deprecated:
 ```php
 $sc->getProjectManager()->projectAddDocument([
     'projectId'=>$projectId, 
     'file' => [
        'filePath'=>'path to file',
        'fileName'=>'File name'
     ]
 ]);
 ```
 
 [Add new target language to project](https://smartcat.ai/api/methods/#!/Project/Project_AddLanguage)
 **POST** /api/integration/v1/project/language  
 ```php
 $sc->getProjectManager()->projectAddLanguage(['projectId'=>$projectId,'targetLanguage'=>'ja']);
 ```
 
 [Assign the group of translators for the specific stage of documents in project](https://smartcat.ai/api/methods/#!/Project/Project_AssignGroupToWorkflowStage)
 **PUT** /api/integration/v1/project/{projectId}/assignGroupToWorkflowStage  
 ```php
 $sc->getProjectManager()->projectAssignGroupToWorkflowStage($projectId,['groupName'=>'Administrators','workflowStage'=>'translation'])
 ```
 
 [Cancel project](https://smartcat.ai/api/methods/#!/Project/Project_CancelProject)
 **POST** /api/integration/v1/project/cancel
 ```php
 $sc->getProjectManager()->projectCancelProject(['projectId'=>$projectId])
 ```

 [Restore project](https://smartcat.ai/api/methods/#!/Project/Project_RestoreProject)
 **POST** /api/integration/v1/project/restore  
 ```php
 $sc->getProjectManager()->projectRestoreProject(['projectId'=>$projectId])
 ```
 
 [Completes the workflow for all project documents. The project status will change to Completed.](https://smartcat.ai/api/methods/#!/Project/Project_CompleteProject)    
 **POST** /api/integration/v1/project/restore  
 ```php
 $sc->getProjectManager()->projectCompleteProject(['projectId' => $this->prj->getId()]);
 ```

## [TranslationMemories](https://smartcat.ai/api/methods/#!/TranslationMemories)
 [Deletes the TM](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_RemoveTranslationMemory)    
 **DELETE** /api/integration/v1/translationmemory/{tmId}    
 ```php
 $sc->getTranslationMemoriesManager()->translationMemoriesRemoveTranslationMemory($tmId)
 ```

 [Gets TM details](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_GetMetaInfo)    
 **GET** /api/integration/v1/translationmemory/{tmId}    
 ```php
 $sc->getTranslationMemoriesManager()->translationMemoriesGetMetaInfo($tmId);
 ```

 [Imports TMX files into the TM](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_Import)    
 **POST** /api/integration/v1/translationmemory/{tmId}    
 ```php
$sc->getTranslationMemoriesManager()->translationMemoriesImport(
    $tmId,
    [
        'replaceAllContent' => 'true',
        'tmxFile' => [
            'filePath' => __DIR__ . '\Resources\Space.tmx'
        ]
    ]
);
 ```

[Gets a collection of TMs available for the account](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_Import)    
 **GET** /api/integration/v1/translationmemory    
 ```php
$thirstRes = $sc->getTranslationMemoriesManager()->translationMemoriesGetTranslationMemoriesBatch([
    'lastProcessedId' => '',
    'batchSize' => 10
]);
$last = array_pop($thirstRes);
$secondRes = $sc->getTranslationMemoriesManager()->translationMemoriesGetTranslationMemoriesBatch([
    'lastProcessedId' => $last->getId(),
    'batchSize' => $count
]);
 ```

[Creates an empty TM](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_CreateEmptyTM)    
 **POST** /api/integration/v1/translationmemory    
 ```php
$tm = new CreateTranslationMemoryModel();
$name = 'PHP Unit ' . date('U');
$tm->setName($name);
$tm->setSourceLanguage('ru');
$tm->setTargetLanguages(['en']);
$tm->setDescription("Description: $name");

$tmId = $sc->getTranslationMemoriesManager()->translationMemoriesCreateEmptyTM($tm);
 ```

[Gets a collection of tasks for TMX import](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_GetPendingTasks)    
 **GET** /api/integration/v1/translationmemory/task    
 ```php
$sc->getTranslationMemoriesManager()->translationMemoriesGetPendingTasks();
 ```

[Sets an array of target languages required by the TM](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_SetTMTargetLanguages)    
 **PUT** /api/integration/v1/translationmemory/{tmId}/target    
 ```php
$sc->getTranslationMemoriesManager()->translationMemoriesSetTMTargetLanguages($tmId, ["en", "es"]);
 ```

[Exports TMX files from the TM](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_ExportFile)    
 **GET** /api/integration/v1/translationmemory/{tmId}/file    
 ```php
$sc->getTranslationMemoriesManager()->translationMemoriesExportFile($tmId, ['withTags' => true])
 ```

[Gets matches from a given TM](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_GetTMTranslations)    
 **POST** /api/integration/v1/translationmemory/matches    
 ```php
$tmMatch = new TmMatchesRequest();
$tmMatch->setSourceLanguage('en');
$tmMatch->setTargetLanguage('ru');
$segmentModel = new SegmentModel();
$segmentModel->setText('Test text message');
$segmentModel->setPrevContext('');
$segmentModel->setNextContext('');
$segmentModel->setTags([]);
$tmMatch->setSegmentModel($segmentModel);

$sc->getTranslationMemoriesManager()->translationMemoriesGetTMTranslations($tmMatch, ['tmId' => $tmId]);
 ```

[Removes a given import task](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_RemoveSpecificImportTask)    
 **DELETE** /api/integration/v1/translationmemory/task/{taskId}    
 ```php
$sc->getTranslationMemoriesManager()->translationMemoriesRemoveSpecificImportTask($last->getId())
 ```

## [User](https://smartcat.ai/api/methods/#!/User)
 [Creates a new user with the specified parameters](https://smartcat.ai/api/methods/#!/User/User_Create)    
 **POST** /api/integration/v1/user     
 ```php
 $user = new CreateUserRequest();
 $user->setEmail('test@test.com')
     ->setFirstName('FirstName')
     ->setLastName('LastName')
     ->setExternalId('my-external-id')
     ->setRightsGroup('executive');
 $res = $sc->getUserManager()->userCreate($user);
 ```


 [Deletes a user](https://smartcat.ai/api/methods/#!/User/User_Delete)    
 **DELETE** /api/integration/v1/user/{accountUserId} 
 ```php
 $sc->getUserManager()->userDelete($smartcatAccountUserId);
 ```


 [Gets a user model](https://smartcat.ai/api/methods/#!/User/User_Get)    
 **GET** /api/integration/v1/user/{accountUserId} 
 ```php
 $res = $sc->getUserManager()->userGet($smartcatAccountUserId);
 ```


 [Updates user data](https://smartcat.ai/api/methods/#!/User/User_Update)    
 **PUT** /api/integration/v1/user/{accountUserId} 
 ```php
 $updateModel = new UpdateUserRequest();
 $updateModel->setFirstName($newName);
 $sc->getUserManager()->userUpdate($smartcatAccountUserId, $updateModel);
 ```


 [Gets a user by its external ID](https://smartcat.ai/api/methods/#!/User/User_Get_0)    
 **GET** /api/integration/v1/user/external  
 ```php
 $res = $sc->getUserManager()->userGetExternal(['id' => $externalId]);
 ```
