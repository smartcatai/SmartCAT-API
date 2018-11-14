<?php

namespace SmartCat\Client\Model;

class TranslationMemoriesForLanguageModel
{
    /**
     * @var string
     */
    protected $language;
    /**
     * @var TranslationMemoryForProjectModel[]
     */
    protected $translationMemories;
    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
    /**
     * @param string $language
     *
     * @return self
     */
    public function setLanguage($language = null)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * @return TranslationMemoryForProjectModel[]
     */
    public function getTranslationMemories()
    {
        return $this->translationMemories;
    }
    /**
     * @param TranslationMemoryForProjectModel[] $translationMemories
     *
     * @return self
     */
    public function setTranslationMemories(array $translationMemories = null)
    {
        $this->translationMemories = $translationMemories;
        return $this;
    }
}