<?php

namespace SmartCAT\API\Normalizer;

class NormalizerFactory
{
    public static function create()
    {
        $normalizers = array();
        $normalizers[] = new \Joli\Jane\Runtime\Normalizer\ArrayDenormalizer();
        $normalizers[] = new AccountModelNormalizer();
        $normalizers[] = new MTEngineModelNormalizer();
        $normalizers[] = new AssignableExecutiveModelNormalizer();
        $normalizers[] = new CallbackPropertyModelNormalizer();
        $normalizers[] = new AdditionalHeaderModelNormalizer();
        $normalizers[] = new CallbackErrorNormalizer();
        $normalizers[] = new FailResponseNormalizer();
        $normalizers[] = new DirectoryModelNormalizer();
        $normalizers[] = new DirectoryItemModelNormalizer();
        $normalizers[] = new FileFormatModelNormalizer();
        $normalizers[] = new DocumentTargetIdNormalizer();
        $normalizers[] = new DocumentModelNormalizer();
        $normalizers[] = new DocumentWorkflowStageModelNormalizer();
        $normalizers[] = new AssignedExecutiveModelNormalizer();
        $normalizers[] = new AssignExecutivesRequestModelNormalizer();
        $normalizers[] = new ExecutiveNormalizer();
        $normalizers[] = new ModelWithFilesUploadDocumentPropertiesModelNormalizer();
        $normalizers[] = new UploadDocumentPropertiesModelNormalizer();
        $normalizers[] = new UploadedFileNormalizer();
        $normalizers[] = new BilingualFileImportSettingsNormalizer();
        $normalizers[] = new ExportDocumentTaskModelNormalizer();
        $normalizers[] = new ProjectModelNormalizer();
        $normalizers[] = new ProjectWorkflowStageModelNormalizer();
        $normalizers[] = new ProjectChangesModelNormalizer();
        $normalizers[] = new ProjectStatisticsObsoleteModelNormalizer();
        $normalizers[] = new StatisticsRowModelNormalizer();
        $normalizers[] = new ProjectStatisticsModelNormalizer();
        $normalizers[] = new ExecutiveStatisticsModelNormalizer();
        $normalizers[] = new ExecutiveModelNormalizer();
        $normalizers[] = new CompletedWorkStatisticsModelNormalizer();
        $normalizers[] = new ProjectTranslationMemoryModelNormalizer();
        $normalizers[] = new TranslationMemoryForProjectModelNormalizer();
        $normalizers[] = new ModelWithFilesCreateProjectModelNormalizer();
        $normalizers[] = new CreateProjectModelNormalizer();
        $normalizers[] = new CreateDocumentPropertyModelNormalizer();
        $normalizers[] = new TranslationMemoryModelNormalizer();
        $normalizers[] = new CreateTranslationMemoryModelNormalizer();
        $normalizers[] = new TMImportTaskModelNormalizer();
        $normalizers[] = new ObjectNormalizer();
        $normalizers[] = new TmMatchesRequestNormalizer();
        $normalizers[] = new SegmentModelNormalizer();
        $normalizers[] = new SegmentTagModelNormalizer();
        $normalizers[] = new SegmentWithMatchesModelNormalizer();
        $normalizers[] = new TagsFromUnitNormalizer();
        return $normalizers;
    }
}