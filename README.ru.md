PHP клиент для SmartCAT API 
==============
[![Latest Version](https://img.shields.io/github/release/smartcatai/SmartCAT-API.svg?style=flat-square)](https://img.shields.io/github/release/smartcatai/SmartCAT-API.svg?style=flat-square)
[![Software License](https://img.shields.io/github/license/smartcatai/SmartCAT-API.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/smartcat/smartcat-api.svg?style=flat-square)](https://packagist.org/packages/smartcat/smartcat-api)

[PHP оболочка для SmartCAT API](https://smartcat.ai/api/methods/)

## Как использовать?
 1. Установить [composer](https://getcomposer.org/)
 2. composer require smartcat/smartcat-api
 3. composer install
 
 [Сценарии использования](https://ru.smartcat.ai/api/docs/)
 
```php
use SmartCat\Client\SmartCAT;

$sc=new SmartCAT($login, $password);
```

## [Account](https://smartcat.ai/api/methods/#!/Account/Account_GetAccountInfo)
 [Получение информации об аккаунте](https://smartcat.ai/api/methods/#!/Account/Account_GetAccountInfo)    
 **GET** /api/integration/v1/account   
 ```php
 $sc->getAccountManager()->accountGetAccountInfo();
 ```

 [Получение движков перевода доступных для аккаунта](https://smartcat.ai/api/methods/#!/Account/Account_GetMTEnginesForAccount)    
 **GET** /api/integration/v1/account/mtengines   
 ```php
 $sc->getAccountManager()->accountGetMTEnginesForAccount();
 ```

[Получение списка услуг доступных для аккаунта](https://smartcat.ai/api/methods/#!/Account/Account_GetLSPServicesForAccount)    
 **GET** /api/integration/v1/account/lsp/services   
 ```php
 $sc->getAccountManager()->accountGetLSPServicesForAccount();
 ```

 [Метод получения доступных для назначения исполнителей (фрилансеров из MyTeam или внутренних пользователей из аккаунта)](https://smartcat.ai/api/methods/#!/Account/Account_GetAssignableExecutives)    
 **GET** /api/integration/v1/account/assignableExecutives  
 ```php
 $sc->getAccountManager()->accountGetAssignableExecutives();
 ```

## [Callback](https://smartcat.ai/api/methods/#!/Callback)
 [Удаление настроек приема уведомлений](https://smartcat.ai/api/methods/#!/Callback/Callback_Delete)    
 **DELETE** /api/integration/v1/callback  
 ```php
 $sc->getCallbackManager()->callbackDelete()
 ```
 
 [Чтение настроек приема уведомлений аккаунта](https://smartcat.ai/api/methods/#!/Callback/Callback_Get)    
 **GET** /api/integration/v1/callback  
 ```php
 $sc->getCallbackManager()->callbackGet()
 ```
 
 [Создание или обновление настроек приема уведомлений](https://smartcat.ai/api/methods/#!/Callback/Callback_Update)    
 **POST** /api/integration/v1/callback  
 ```php
 $callback=new CallbackPropertyModel();
 $callback->setUrl('https://smartcat.ai');
 $res=$sc->getCallbackManager()->callbackUpdate($callback);
 ```
 
 [Чтение последних ошибок отправки (не более 100)](https://smartcat.ai/api/methods/#!/Callback/Callback_GetLastErrors)    
 **GET** /api/integration/v1/callback/lastErrors  
 ```php
 $sc->getCallbackManager()->callbackGetLastErrors(['limit'=>$limit])
 ```

## [Client](https://smartcat.ai/api/methods/#!/Client)
 [Создать клиента с заданным именем и вернуть его Id.](https://smartcat.ai/api/methods/#!/Client/Client_CreateClient)  
 Если клиент с таким именем существовал, то просто вернуть его Id.    
 **POST** /api/integration/v1/client/create
 ```php
$clientId = $sc->getClientManager()->clientCreateClient('Test client');
 ```

 [Получение информации о клиенте аккаунта](https://smartcat.ai/api/methods/#!/Client/Client_GetClient)  
 **GET** /api/integration/v1/client/{clientId}
 ```php
$client = $sc->getClientManager()->clientGetClient($clientId);
 ```

 [Устанавливает указанному клиенту указанную сетку скидок](https://smartcat.ai/api/methods/#!/Client/Client_SetClientNetRate)  
 **PUT** /api/integration/v1/client/{clientId}/set
 ```php
$client = $sc->getClientManager()->clientSetClientNetRate($clientId, ['netRateId' => $netRateId]);
 ```

## [Directories](https://smartcat.ai/api/methods/#!/Directories)
 [Получить заданный справочник](https://smartcat.ai/api/methods/#!/Directories/Directories_Get)    
 **GET** /api/integration/v1/directory  
 ```php
 $sc->getDirectoriesManager()->directoriesGet(['type'=>'projectStatus'])
 ```

 [Получить поддерживаемые в аккунте форматы для разбора](https://smartcat.ai/api/methods/#!/Directories/Directories_GetSupportedFormatsForAccount)    
 **GET** /api/integration/v1/directory/formats  
 ```php
$sc->getDirectoriesManager()->directoriesGetSupportedFormatsForAccount();
 ```

## [Document](https://smartcat.ai/api/methods/#!/Document)
 [Удалить один или несколько документов](https://smartcat.ai/api/methods/#!/Document/Document_Delete)    
 **DELETE** /api/integration/v1/document  
 ```php
 $sc->getDocumentManager()->documentDelete(['documentIds'=>['id1','id2']])
 ```
 
 [Получить модель документа](https://smartcat.ai/api/methods/#!/Document/Document_Get)    
 **GET** /api/integration/v1/document  
 ```php
 $sc->getDocumentManager()->documentGet(['documentId'=>$docId])
 ```
 
 [Обновить заданный документ](https://smartcat.ai/api/methods/#!/Document/Document_Update)    
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
         'fileContent' => fopen('file path', 'r'),
         'fileName' => 'file.txt'
     ]
 ]);
 ```
 
 [Переименовать заданный документ](https://smartcat.ai/api/methods/#!/Document/Document_Rename)    
 **PUT** /api/integration/v1/document/rename
 ```php
 $sc->getDocumentManager()->documentRename(['documentId'=>$docId,'name'=>'New file name'])
 ```
 
 [Перевести указанный документ, используя переданный файл с переводами](https://smartcat.ai/api/methods/#!/Document/Document_Translate)    
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
 
 [Получить статус задачи добавления перевода документа](https://smartcat.ai/api/methods/#!/Document/Document_GetTranslationStatus)    
 **GET** /api/integration/v1/document/translate/status
 ```php
 $sc->getDocumentManager()->documentGetTranslationStatus(['documentId'=>$docId])
 ```
 
 [Получить подробный отчёт о результатах выполнения импорта переводов](https://smartcat.ai/api/methods/#!/Document/Document_GetTranslationsImportResult)    
 **GET** /api/integration/v1/document/translate/result
 ```php
 $sc->getDocumentManager()->documentGetTranslationsImportResult(['documentId' => $docsId]);
 ```
 
 [Получить статистику](https://smartcat.ai/api/methods/#!/Document/Document_GetTranslationsImportResult)    
 **GET** /api/integration/v1/document/statistics
 ```php
 $sc->getDocumentManager()->documentGetStatistics(['documentId' => $docsId]);
 ```
 
 [Разбить документ на равные блоки по количеству слов и назначить каждого из указанных фрилансеров на один блок - устаревший](https://smartcat.ai/api/methods/#!/Document/Document_AssignFreelancersToDocument)    
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
  
 [Разбить документ на равные блоки по количеству слов и назначить каждого из указанных фрилансеров на один блок](https://smartcat.ai/api/methods/#!/Document/Document_AssignFreelancersToDocument)    
 **POST** /api/integration/v1/document/assign    
  ```php
$assignExecutivesRequestModel = new AssignExecutivesRequestModel();
$executive = new Executive();
$executive->setId($freelancerId);
$assignExecutivesRequestModel->setExecutives([$executive]);
$res=$sc->getDocumentManager()->documentAssignExecutives(
    $assignExecutivesRequestModel,
    [
        'documentId' => $docId,
        'stageNumber' => $stageNumber
    ]
);
 ```
## [DocumentExport](https://smartcat.ai/api/methods/#!/DocumentExport)
 [Запросить на экспорт документа(-ов)](https://smartcat.ai/api/methods/#!/DocumentExport/DocumentExport_RequestExport)    
 **POST** /api/integration/v1/document/export  
 ```php
 $sc->getDocumentExportManager()->documentExportRequestExport(['documentIds'=>['documenId1','documentId2'])
 ```
 
 [Скачать результат экспорта](https://smartcat.ai/api/methods/#!/DocumentExport/DocumentExport_DownloadExportResult)    
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
 [Создание начисления фрилансеру](https://smartcat.ai/api/methods/#!/Invoice/Invoice_ImportJob)    
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
 [Получить все доступные в текущем аккаунте форматы плейсхолдеров](https://smartcat.ai/api/methods/#!/PlaceholderFormatApi/PlaceholderFormatApi_GetPlaceholderFormats)    
 **GET** /api/integration/v1/placeholders  
 ```php
 $res = $sc->getPlaceholderFormatApiManager()->placeholderFormatApiGetPlaceholderFormats();
 ```


 [Сохранить набор форматов плейсхолдеров для данного аккаунта](https://smartcat.ai/api/methods/#!/PlaceholderFormatApi/PlaceholderFormatApi_UpdatePlaceholderFormats)    
 **PUT** /api/integration/v1/placeholders  
 ```php
 $placeHolder1 = new PlaceholderFormatModel();
 $placeHolder1->setRegex($regEx1);
 $placeHolder2 = new PlaceholderFormatModel();
 $placeHolder2->setRegex($regEx2);
 $res = $sc->getPlaceholderFormatApiManager()->placeholderFormatApiUpdatePlaceholderFormats([$placeHolder1, $placeHolder2]);
 ```


 [Провести валидацию указанного формата плейсхолдеров](https://smartcat.ai/api/methods/#!/PlaceholderFormatApi/PlaceholderFormatApi_ValidatePlaceholderFormat)    
 **GET** /api/integration/v1/placeholders/validate   
 ```php
 $res = $this->sc->getPlaceholderFormatApiManager()->placeholderFormatApiValidatePlaceholderFormat(['format' => 'Stable\:(\s+)(.+)[\r|]\n']);
 ```

## [Project](https://smartcat.ai/api/methods/#!/Project)
 [Удалить проект](https://smartcat.ai/api/methods/#!/Project/Project_Delete)    
 **DELETE** /api/integration/v1/project/{projectId}
 ```php
 $sc->getProjectManager()->projectDelete($projectId)
 ```
 
 [Получить модель проекта](https://smartcat.ai/api/methods/#!/Project/Project_Get)    
 **GET** /api/integration/v1/project/{projectId}
 ```php
 sc->getProjectManager()->projectGet($projectId)
 ```
 
 [Обновить проект по id](https://smartcat.ai/api/methods/#!/Project/Project_UpdateProject)  - **Не рабочий метод API**  
 **PUT** /api/integration/v1/project/{projectId} - **Не работает!**
 
 [Получить список всех проектов в аккаунте](https://smartcat.ai/api/methods/#!/Project/Project_GetAll)    
 **GET** /api/integration/v1/project/list
 ```php
 $sc->getProjectManager()->projectGetAll()
 ```
 
 [Получить статистику и стоимость по проекту](https://smartcat.ai/api/methods/#!/Project/Project_GetProjectStatistics)      
 **GET** /api/integration/v2/project/{projectId}/statistics  
 ```php
$sc->getProjectManager()->projectGetProjectStatistics($projectId);
do {
    sleep(5);
    $res = $sc->getProjectManager()->projectGetProjectStatistics($projectId);
} while(!is_array($res));
 ```
 
 [Получение статистики по выполненной в проекте работе](https://smartcat.ai/api/methods/#!/Project/Project_GetCompletedWorkStatistics)      
 **GET** /api/integration/v1/project/{projectId}/completedWorkStatistics   
 ```php
 $res = $sc->getProjectManager()->projectGetCompletedWorkStatistics($projectId);
 ```

 [Получение списка идентификаторов ТМ подключенных к проекту](https://smartcat.ai/api/methods/#!/Project/Project_GetProjectTranslationMemories)      
 **GET** /api/integration/v1/project/{projectId}/translationmemories    
 ```php
 $res = $sc->getProjectManager()->projectGetProjectTranslationMemories($projectId);
 ```

 [Перезаписать набор ТМ подключенных к проекту, набор ТМ одинаков для всех языков перевода проекта](https://smartcat.ai/api/methods/#!/Project/Project_SetTranslationMemoriesForWholeProject)      
 **POST** /api/integration/v1/project/{projectId}/translationmemories    
 ```php
 $translationMemoryForProjectModel = new TranslationMemoryForProjectModel();
 $translationMemoryForProjectModel->setId($tmId);
 $translationMemoryForProjectModel->setIsWritable(true);
 $translationMemoryForProjectModel->setMatchThreshold(100);
 $res = $sc->getProjectManager()->projectSetTranslationMemoriesForWholeProject($projectId, [$translationMemoryForProjectModel]);
 ```

 [Получить набор подключённых глоссариев к проекту](https://smartcat.ai/api/methods/#!/Project/Project_GetGlossaries)      
 **GET** /api/integration/v1/project/{projectId}/glossaries    
 ```php
 $res = $sc->getProjectManager()->projectGetGlossaries($projectId);
 ```

 [Установить набор подключённых глоссариев к проекту](https://smartcat.ai/api/methods/#!/Project/Project_SetGlossaries)      
 **PUT** /api/integration/v1/project/{projectId}/glossaries    
 ```php
 $res = $this->sc->getProjectManager()->projectSetGlossaries($projectId, [$glossaryId1, $glossaryId2]);
 ```

 [Запустить построение статистики по проекту](https://smartcat.ai/api/methods/#!/Project/Project_BuildStatistics)      
 **POST** /api/integration/v1/project/{projectId}/statistics/build      
 ```php
 $sc->getProjectManager()->projectBuildStatistics($this->prj->getId());
 ```

 [Перезаписать набор ТМ подключенных к проекту, для каждого языка перевода проекта задается свой набор ТМ](https://smartcat.ai/api/methods/#!/Project/Project_SetTranslationMemoriesForWholeProject)      
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

[Создать проект](https://smartcat.ai/api/methods/#!/Project/Project_CreateProject)    
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
  
 [Добавить документ к проекту](https://smartcat.ai/api/methods/#!/Project/Project_AddDocument)    
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
 устаревший вариант:
 ```php
 $sc->getProjectManager()->projectAddDocument([
    'projectId'=>$projectId, 
    'file' => [
        'filePath' => '\Resources\File2_EN.docx',
        'fileName' => 'File2_EN.docx'
    ]
 ]);
 ```
 
 [Добавить новый целевой язык к проекту](https://smartcat.ai/api/methods/#!/Project/Project_AddLanguage)    
 **POST** /api/integration/v1/project/language  
 ```php
 $sc->getProjectManager()->projectAddDocument([
     'projectId'=>$projectId, 
     'file' => [
        'filePath'=>'path to file',
        'fileName'=>'File name'
     ]
 ]);
 ```
 
 [Назначить группу исполнителей на конкретный этап документов в проекте](https://smartcat.ai/api/methods/#!/Project/Project_AssignGroupToWorkflowStage)    
 **PUT** /api/integration/v1/project/{projectId}/assignGroupToWorkflowStage  
 ```php
 $sc->getProjectManager()->projectAssignGroupToWorkflowStage($projectId,['groupName'=>'Administrators','workflowStage'=>'translation'])
 ```
 
 [Отменить проект](https://smartcat.ai/api/methods/#!/Project/Project_CancelProject)    
 **POST** /api/integration/v1/project/cancel
 ```php
 $sc->getProjectManager()->projectCancelProject(['projectId'=>$projectId])
 ```

 [Восстановить проект](https://smartcat.ai/api/methods/#!/Project/Project_RestoreProject)    
 **POST** /api/integration/v1/project/restore  
 ```php
 $sc->getProjectManager()->projectRestoreProject(['projectId'=>$projectId])
 ```

 [Завершить workflow всех документов проекта. Как следствие, статус проекта перейдёт в Completed.](https://smartcat.ai/api/methods/#!/Project/Project_CompleteProject)    
 **POST** /api/integration/v1/project/restore  
 ```php
 $sc->getProjectManager()->projectCompleteProject(['projectId' => $this->prj->getId()]);
 ```

## [TranslationMemories](https://smartcat.ai/api/methods/#!/TranslationMemories)
 [Удалить ТМ](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_RemoveTranslationMemory)    
 **DELETE** /api/integration/v1/translationmemory/{tmId}    
 ```php
 $sc->getTranslationMemoriesManager()->translationMemoriesRemoveTranslationMemory($tmId)
 ```


 [Получить информацию о TM](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_GetMetaInfo)    
 **GET** /api/integration/v1/translationmemory/{tmId}    
 ```php
 $sc->getTranslationMemoriesManager()->translationMemoriesGetMetaInfo($tmId);
 ```


 [Импорт tmx-файлов в TM](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_Import)    
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

[Получить пачку доступных ТМ с фильтрацией в аккаунте](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_Import)    
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

[Создать пустую ТМ](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_CreateEmptyTM)    
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

[Получить коллекцию задач на импорт tmx-файлов](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_GetPendingTasks)    
 **GET** /api/integration/v1/translationmemory/task    
 ```php
$sc->getTranslationMemoriesManager()->translationMemoriesGetPendingTasks();
 ```

[Установить массив требуемых целевых языков в ТМ](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_SetTMTargetLanguages)    
 **PUT** /api/integration/v1/translationmemory/{tmId}/target    
 ```php
$sc->getTranslationMemoriesManager()->translationMemoriesSetTMTargetLanguages($tmId, ["en", "es"]);
 ```

[Экспорт tmx файлов из базы ТМ](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_ExportFile)    
 **GET** /api/integration/v1/translationmemory/{tmId}/file    
 ```php
$sc->getTranslationMemoriesManager()->translationMemoriesExportFile($tmId, ['withTags' => true])
 ```

[Получение матчей из указанной ТМ](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_GetTMTranslations)    
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

[Удалить указанную задачу на импорт](https://smartcat.ai/api/methods/#!/TranslationMemories/TranslationMemories_RemoveSpecificImportTask)    
 **DELETE** /api/integration/v1/translationmemory/task/{taskId}    
 ```php
$sc->getTranslationMemoriesManager()->translationMemoriesRemoveSpecificImportTask($last->getId())
 ```

## [User](https://smartcat.ai/api/methods/#!/User)
 [Создать нового пользователя с указанными параметрами](https://smartcat.ai/api/methods/#!/User/User_Create)    
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


 [Удалить пользователя](https://smartcat.ai/api/methods/#!/User/User_Delete)    
 **DELETE** /api/integration/v1/user/{accountUserId} 
 ```php
 $sc->getUserManager()->userDelete($smartcatAccountUserId);
 ```


 [Получить модель пользователя](https://smartcat.ai/api/methods/#!/User/User_Get)    
 **GET** /api/integration/v1/user/{accountUserId} 
 ```php
 $res = $sc->getUserManager()->userGet($smartcatAccountUserId);
 ```


 [Обновить данные о пользователе](https://smartcat.ai/api/methods/#!/User/User_Update)    
 **PUT** /api/integration/v1/user/{accountUserId} 
 ```php
 $updateModel = new UpdateUserRequest();
 $updateModel->setFirstName($newName);
 $sc->getUserManager()->userUpdate($smartcatAccountUserId, $updateModel);
 ```


 [Получить пользователя по его внешнему идентификатору](https://smartcat.ai/api/methods/#!/User/User_Get_0)    
 **GET** /api/integration/v1/user/external  
 ```php
 $res = $sc->getUserManager()->userGetExternal(['id' => $externalId]);
 ```
