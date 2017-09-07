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
        $normalizers[] = new CallbackErrorModelNormalizer();
        $normalizers[] = new ClientModelNormalizer();
        $normalizers[] = new NetRateModelNormalizer();
        $normalizers[] = new TMRangeRateModelNormalizer();
        $normalizers[] = new DirectoryModelNormalizer();
        $normalizers[] = new DirectoryItemModelNormalizer();
        $normalizers[] = new FileFormatModelNormalizer();
        $normalizers[] = new DocumentTargetIdNormalizer();
        $normalizers[] = new DocumentModelNormalizer();
        $normalizers[] = new DocumentWorkflowStageModelNormalizer();
        $normalizers[] = new AssignedExecutiveModelNormalizer();
        $normalizers[] = new ObjectNormalizer();
        $normalizers[] = new DocumentStatisticsModelNormalizer();
        $normalizers[] = new StatisticsRowModelNormalizer();
        $normalizers[] = new AssignExecutivesRequestModelNormalizer();
        $normalizers[] = new ExecutiveNormalizer();
        $normalizers[] = new ModelWithFilesUploadDocumentPropertiesModelNormalizer();
        $normalizers[] = new UploadDocumentPropertiesModelNormalizer();
        $normalizers[] = new UploadedFileNormalizer();
        $normalizers[] = new BilingualFileImportSettingsModelNormalizer();
        $normalizers[] = new ExportDocumentTaskModelNormalizer();
        $normalizers[] = new ImportJobModelNormalizer();
        $normalizers[] = new CreateInvoiceModelNormalizer();
        $normalizers[] = new CancelInvoiceModelNormalizer();
        $normalizers[] = new PlaceholderFormatModelNormalizer();
        $normalizers[] = new ProjectModelNormalizer();
        $normalizers[] = new ProjectWorkflowStageModelNormalizer();
        $normalizers[] = new ProjectChangesModelNormalizer();
        $normalizers[] = new ProjectStatisticsObsoleteModelNormalizer();
        $normalizers[] = new ProjectStatisticsModelNormalizer();
        $normalizers[] = new ExecutiveStatisticsModelNormalizer();
        $normalizers[] = new ExecutiveModelNormalizer();
        $normalizers[] = new ProjectTranslationMemoryModelNormalizer();
        $normalizers[] = new TranslationMemoryForProjectModelNormalizer();
        $normalizers[] = new ModelWithFilesCreateProjectModelNormalizer();
        $normalizers[] = new CreateProjectModelNormalizer();
        $normalizers[] = new CreateDocumentPropertyModelNormalizer();
        $normalizers[] = new ModelWithFilesIReadOnlyListCreateDocumentPropertyModelNormalizer();
        $normalizers[] = new TranslationMemoriesForLanguageModelNormalizer();
        $normalizers[] = new TranslationMemoryModelNormalizer();
        $normalizers[] = new CreateTranslationMemoryModelNormalizer();
        $normalizers[] = new TMImportTaskModelNormalizer();
        $normalizers[] = new TmMatchesRequestNormalizer();
        $normalizers[] = new SegmentModelNormalizer();
        $normalizers[] = new SegmentTagModelNormalizer();
        $normalizers[] = new SegmentWithMatchesModelNormalizer();
        $normalizers[] = new TagsFromUnitNormalizer();
        $normalizers[] = new CreateUserRequestNormalizer();
        $normalizers[] = new UserModelNormalizer();
        $normalizers[] = new UpdateUserRequestNormalizer();
        return $normalizers;
    }
}