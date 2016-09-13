<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Normalizer\ReferenceNormalizer;
use Joli\Jane\Normalizer\NormalizerArray;
class NormalizerFactory
{
    public static function create()
    {
        $normalizers = array();
        $normalizers[] = new ReferenceNormalizer();
        $normalizers[] = new NormalizerArray();
        $normalizers[] = new AccountModelNormalizer();
        $normalizers[] = new CallbackPropertyModelNormalizer();
        $normalizers[] = new ObjectNormalizer();
        $normalizers[] = new DirectoryModelNormalizer();
        $normalizers[] = new DirectoryItemModelNormalizer();
        $normalizers[] = new DocumentTargetIdNormalizer();
        $normalizers[] = new DocumentModelNormalizer();
        $normalizers[] = new DocumentWorkflowStageModelNormalizer();
        $normalizers[] = new UploadedFileNormalizer();
        $normalizers[] = new ExportDocumentTaskModelNormalizer();
        $normalizers[] = new ProjectModelNormalizer();
        $normalizers[] = new ProjectWorkflowStageModelNormalizer();
        $normalizers[] = new ProjectChangesModelNormalizer();
        $normalizers[] = new ProjectStatisticsModelNormalizer();
        $normalizers[] = new StatisticsRowModelNormalizer();
        $normalizers[] = new ModelWithFilesCreateProjectModelNormalizer();
        $normalizers[] = new CreateProjectModelNormalizer();
        $normalizers[] = new CreateDocumentPropertyModelNormalizer();
        return $normalizers;
    }
}