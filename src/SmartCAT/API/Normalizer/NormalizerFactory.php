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
        $normalizers[] = new UploadedFileNormalizer();
        $normalizers[] = new ExportDocumentTaskModelNormalizer();
        $normalizers[] = new ProjectModelNormalizer();
        $normalizers[] = new ProjectWorkflowStageModelNormalizer();
        $normalizers[] = new ProjectChangesModelNormalizer();
        $normalizers[] = new ProjectStatisticsModelNormalizer();
        $normalizers[] = new StatisticsRowModelNormalizer();
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
        //TODO: В ручную зозданные нормалайзеры
        $normalizers[] = new TranslationMemoryImportTaskModelNormalizer();
        $normalizers[] = new TranslationMemoryMatchesModelNormalizer();
        $normalizers[] = new TranslationMemoryMatchesTagsModelNormalizer();
        return $normalizers;
    }
}