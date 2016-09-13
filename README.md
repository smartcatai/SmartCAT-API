PHP клиент для SmartCAT API 
==============
Версия от 19.08.2016
[PHP оболочка для SmartCAT API](https://smartcat.ai/api/methods/)

## Как использовать?
```php
use SmartCAT\SmartCAT;

$sc=new SmartCAT($login, $password);
```
На текущий момент проверены не все методы API

## [Callback](https://smartcat.ai/api/methods/#!/Callback)
 [Удаление настроек приема уведомлений](https://smartcat.ai/api/methods/#!/Callback/Callback_Delete) - **Протестировано**  
 **DELETE** /api/integration/v1/callback  
 ```php
 $sc->getCallbackManager()->callbackDelete()
 ```
 
 [Чтение настроек приема уведомлений аккаунта](https://smartcat.ai/api/methods/#!/Callback/Callback_Get) - **Протестировано**  
 **GET** /api/integration/v1/callback  
 ```php
 $sc->getCallbackManager()->callbackGet()
 ```
 
 [Создание или обновление настроек приема уведомлений](https://smartcat.ai/api/methods/#!/Callback/Callback_Update) - **Протестировано**  
 **POST** /api/integration/v1/callback  
 ```php
 $callback=new CallbackPropertyModel();
 $callback->setUrl('https://smartcat.ai');
 $res=$this->sc->getCallbackManager()->callbackUpdate($callback);
 ```
 
 [Чтение последних ошибок отправки (не более 100)](https://smartcat.ai/api/methods/#!/Callback/Callback_GetLastErrors) - **Протестировано**  
 **GET** /api/integration/v1/callback/lastErrors  
 ```php
 $sc->getCallbackManager()->callbackGetLastErrors(['limit'=>$limit])
 ```

## [Directories](https://smartcat.ai/api/methods/#!/Directories)
 [Получить заданный справочник](https://smartcat.ai/api/methods/#!/Directories/Directories_Get) - **Протестировано**  
 **GET** /api/integration/v1/directory  
 ```php
 $sc->getDirectoriesManager()->directoriesGet(['type'=>'projectStatus'])
 ```

## [Document](https://smartcat.ai/api/methods/#!/Document)
 [Удалить один или несколько документов](https://smartcat.ai/api/methods/#!/Document/Document_Delete) - **Протестировано**  
 **DELETE** /api/integration/v1/document  
 ```php
 $sc->getDocumentManager()->documentDelete(['documentIds'=>['id1','id2']])
 ```
 
 [Получить модель документа](https://smartcat.ai/api/methods/#!/Document/Document_Get) - **Протестировано**  
 **GET** /api/integration/v1/document  
 ```php
 $sc->getDocumentManager()->documentGet(['documentId'=>$docId])
 ```
 
 [Обновить заданный документ](https://smartcat.ai/api/methods/#!/Document/Document_Update) - **Протестировано**  
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
 
 [Переименовать заданный документ](https://smartcat.ai/api/methods/#!/Document/Document_Rename) - **Протестировано**  
 **PUT** /api/integration/v1/document/rename
 ```php
 $sc->getDocumentManager()->documentRename(['documentId'=>$docId,'name'=>'New file name'])
 ```
 
 [Перевести указанный документ, используя переданный файл с переводами](https://smartcat.ai/api/methods/#!/Document/Document_Translate) - **Протестировано**  
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
 
 [Получить статус задачи добавления перевода документа](https://smartcat.ai/api/methods/#!/Document/Document_GetTranslationStatus) - **Протестировано**  
 **GET** /api/integration/v1/document/translate/status
 ```php
 $sc->getDocumentManager()->documentGetTranslationStatus(['documentId'=>$docId])
 ```
 
 [Разбить документ на равные блоки по количеству слов и назначить каждого из указанных фрилансеров на один блок](https://smartcat.ai/api/methods/#!/Document/Document_AssignFreelancersToDocument) - **Протестировано**  
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
 [Запросить на экспорт документа(-ов)](https://smartcat.ai/api/methods/#!/DocumentExport/DocumentExport_RequestExport) - **Протестировано**  
 **POST** /api/integration/v1/document/export  
 ```php
 $sc->getDocumentExportManager()->documentExportRequestExport(['documentIds'=>['documenId1','documentId2'])
 ```
 
 [Скачать результат экспорта](https://smartcat.ai/api/methods/#!/DocumentExport/DocumentExport_DownloadExportResult) - **Протестировано**  
 **GET** /api/integration/v1/document/export/{taskId}  
 ```php
 $sc->getDocumentExportManager()->documentExportDownloadExportResult($taskId);
 ```
 
## [Project](https://smartcat.ai/api/methods/#!/Project)
 [Удалить проект](https://smartcat.ai/api/methods/#!/Project/Project_Delete) - **Протестировано**  
 **DELETE** /api/integration/v1/project/{projectId}
 ```php
 $sc->getProjectManager()->projectDelete($projectId)
 ```
 
 [Получить модель проекта](https://smartcat.ai/api/methods/#!/Project/Project_Get) - **Протестировано**  
 **GET** /api/integration/v1/project/{projectId}
 ```php
 sc->getProjectManager()->projectGet($projectId)
 ```
 
 [Обновить проект по id](https://smartcat.ai/api/methods/#!/Project/Project_UpdateProject)  - **Не рабочий метод API**  
 **PUT** /api/integration/v1/project/{projectId} - **Не работает!**
 
 [Получить список всех проектов в аккаунте](https://smartcat.ai/api/methods/#!/Project/Project_GetAll) - **Протестировано**  
 **GET** /api/integration/v1/project/list
 ```php
 $sc->getProjectManager()->projectGetAll()
 ```
 
 [Получить статистику и стоимость по проекту](https://smartcat.ai/api/methods/#!/Project/Project_GetProjectStatistics) - **Протестировано**    
 **GET** /api/integration/v1/project/{projectId}/statistics  
 ```php
$sc->getProjectManager()->projectGetProjectStatistics($projectId);
 ```
 
 [Создать проект](https://smartcat.ai/api/methods/#!/Project/Project_CreateProject) - **Протестировано**  
 **POST** /api/integration/v1/project/create  
 ```php
 $sc->getProjectManager()->projectCreateProjectWithFiles($prjInfo);
 ```
  
 [Добавить документ к проекту](https://smartcat.ai/api/methods/#!/Project/Project_AddDocument) - **Протестировано**  
 **POST** /api/integration/v1/project/document  
 ```php
 $sc->getProjectManager()->projectAddDocument(['projectId'=>$projectId, 'filePath'=>'path to file','fileName'=>'File name']);
 ```
 
 [Добавить новый целевой язык к проекту](https://smartcat.ai/api/methods/#!/Project/Project_AddLanguage) - **Протестировано**  
 **POST** /api/integration/v1/project/language  
 ```php
 $sc->getProjectManager()->projectAddLanguage(['projectId'=>$projectId,'targetLanguage'=>'ja']);
 ```
 
 [Назначить группу исполнителей на конкретный этап документов в проекте](https://smartcat.ai/api/methods/#!/Project/Project_AssignGroupToWorkflowStage) - **Протестировано**  
 **PUT** /api/integration/v1/project/{projectId}/assignGroupToWorkflowStage  
 ```php
 $sc->getProjectManager()->projectAssignGroupToWorkflowStage($projectId,['groupName'=>'Administrators','workflowStage'=>'translation'])
 ```
 
 [Отменить проект](https://smartcat.ai/api/methods/#!/Project/Project_CancelProject) - **Протестировано**  
 **POST** /api/integration/v1/project/cancel
 ```php
 $sc->getProjectManager()->projectCancelProject(['projectId'=>$projectId])
 ```

 [Восстановить проект](https://smartcat.ai/api/methods/#!/Project/Project_RestoreProject) - **Протестировано**  
 **POST** /api/integration/v1/project/restore  
 ```php
 $sc->getProjectManager()->projectRestoreProject(['projectId'=>$projectId])
 ```
