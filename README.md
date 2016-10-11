PHP client SmartCAT API 
==============
Version from 19.08.2016
[PHP client SmartCAT API](https://smartcat.ai/api/methods/)

## How to use:
 1. Install [composer](https://getcomposer.org/)
 2. composer require smartcat/smartcat-api
 3. composer install 
```php 
use SmartCAT\API\SmartCAT;

$sc=new SmartCAT($login, $password);
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
 $res=$this->sc->getCallbackManager()->callbackUpdate($callback);
 ```
 
 [Reading the last sending errors (no more than 100)](https://smartcat.ai/api/methods/#!/Callback/Callback_GetLastErrors)
 **GET** /api/integration/v1/callback/lastErrors  
 ```php
 $sc->getCallbackManager()->callbackGetLastErrors(['limit'=>$limit])
 ```

## [Directories](https://smartcat.ai/api/methods/#!/Directories)
 [Receive the specified directory](https://smartcat.ai/api/methods/#!/Directories/Directories_Get)
 **GET** /api/integration/v1/directory  
 ```php
 $sc->getDirectoriesManager()->directoriesGet(['type'=>'projectStatus'])
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
 $sc->getDocumentManager()->documentUpdate([
    'documentId'=>$docId,
    'uploadedFile'=>[
        'filePath'=>'\Resources\File2_EN.docx',
        'fileName'=>'File2_EN.docx'
    ]
 ])
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
        'filePath'=>'Путь к файлу',
        'fileName'=>'Имя файла'
    ]
 ])
 ```
 
 [Receive the status of adding document translation](https://smartcat.ai/api/methods/#!/Document/Document_GetTranslationStatus)
 **GET** /api/integration/v1/document/translate/status
 ```php
 $sc->getDocumentManager()->documentGetTranslationStatus(['documentId'=>$docId])
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
 
 [Update project using ID](https://smartcat.ai/api/methods/#!/Project/Project_UpdateProject)  - **Не рабочий метод API**  
 **PUT** /api/integration/v1/project/{projectId} - **Не работает!**
 
 [Receive the list of all projects in account](https://smartcat.ai/api/methods/#!/Project/Project_GetAll)
 **GET** /api/integration/v1/project/list
 ```php
 $sc->getProjectManager()->projectGetAll()
 ```
 
 [Receive statistics and project value](https://smartcat.ai/api/methods/#!/Project/Project_GetProjectStatistics)  
 **GET** /api/integration/v1/project/{projectId}/statistics  
 ```php
$sc->getProjectManager()->projectGetProjectStatistics($projectId);
 ```
 
 [Create a project](https://smartcat.ai/api/methods/#!/Project/Project_CreateProject)
 **POST** /api/integration/v1/project/create  
 ```php
 $sc->getProjectManager()->projectCreateProjectWithFiles($prjInfo);
 ```
  
 [Add new document to project](https://smartcat.ai/api/methods/#!/Project/Project_AddDocument)
 **POST** /api/integration/v1/project/document  
 ```php
 $sc->getProjectManager()->projectAddDocument(['projectId'=>$projectId, 'filePath'=>'path to file','fileName'=>'File name']);
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
