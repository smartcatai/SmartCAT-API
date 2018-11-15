<?php

namespace SmartCat\Client;

use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\ContentLengthPlugin;
use Http\Client\Common\Plugin\DecoderPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Client\HttpClient;
use Http\Client\Socket\Client as SocketHttpClient;
use Http\Message\Authentication\BasicAuth;
use Http\Message\MessageFactory;
use SmartCat\Client\Helper\RawEncoder;
use SmartCat\Client\Manager\AccountManager;
use SmartCat\Client\Manager\CallbackManager;
use SmartCat\Client\Manager\ClientManager;
use SmartCat\Client\Manager\DirectoriesManager;
use SmartCat\Client\Manager\DocumentExportManager;
use SmartCat\Client\Manager\DocumentManager;
use SmartCat\Client\Manager\GlossaryManager;
use SmartCat\Client\Manager\InvoiceManager;
use SmartCat\Client\Manager\PlaceholderFormatApiManager;
use SmartCat\Client\Manager\ProjectManager;
use SmartCat\Client\Manager\TranslationMemoriesManager;
use SmartCat\Client\Manager\UserManager;
use SmartCat\Client\Normalizer\AbstractNormalizer;
use SmartCat\Client\Normalizer\NormalizerFactory;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class SmartCat
{
    const SC_USA = 'us.smartcat.ai';
    const SC_EUROPE = 'smartcat.ai';
    const SC_ASIA = 'ea.smartcat.ai';

    /**
     * @var HttpClient
     */
    private $httpClient;
    /**
     * @var Serializer
     */
    private $serializer;
    /**
     * @var MessageFactory
     */
    private $messageFactory;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $host;

    /**
     * SmartCAT constructor.
     * @param string $login API логин
     * @param string $password API пароль
     * @param string $host Имя сервера smartCAT
     */
    public function __construct($login, $password, $host = self::SC_EUROPE)
    {
        $this->login = $login;
        $this->password = $password;
        $this->host = $host;

        $normalizers = NormalizerFactory::create();
        $serializer = new Serializer(
            $normalizers,
            [
                new JsonEncoder(
                    new JsonEncode(),
                    new JsonDecode()
                ),
                new RawEncoder()
            ]
        );

        /** @var AbstractNormalizer $normalizer */
        foreach ($normalizers as $normalizer) {
            $normalizer->setSerializer($serializer);
        }

        $messageFactory = new MessageFactory\GuzzleMessageFactory();

        $this->serializer = $serializer;
        $this->messageFactory = $messageFactory;
        $options = [
            'remote_socket' => "tcp://$this->host:443",
            'ssl' => true
        ];

        $socketClient = new SocketHttpClient($messageFactory, $options);
        $lengthPlugin = new ContentLengthPlugin();
        $decodingPlugin = new DecoderPlugin();
        $errorPlugin = new ErrorPlugin();
        $authentication = new BasicAuth($this->login, $this->password);
        $authenticationPlugin = new AuthenticationPlugin($authentication);
        $this->httpClient = new PluginClient($socketClient, [
            $errorPlugin,
            $lengthPlugin,
            $decodingPlugin,
            $authenticationPlugin
        ]);
    }


    /**
     * @var ProjectManager
     */
    private $projectManager;

    /**
     * Интерфейс для работы с проектами
     *
     * @return ProjectManager
     */

    public function getProjectManager()
    {
        if (null === $this->projectManager) {
            $this->projectManager = new ProjectManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->projectManager->setHost($this->host);
        }
        return $this->projectManager;
    }

    /**
     * @var DirectoriesManager
     */
    private $directoriesManager;

    /**
     * Интерфейс для работы со справочниками
     *
     * @return DirectoriesManager
     */
    public function getDirectoriesManager()
    {
        if (null === $this->directoriesManager) {
            $this->directoriesManager = new DirectoriesManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->directoriesManager->setHost($this->host);
        }
        return $this->directoriesManager;
    }

    /**
     * @var AccountManager
     */
    private $accountManager;

    /**
     * Интерфейс для работы со справочниками
     *
     * @return AccountManager
     */
    public function getAccountManager()
    {
        if (null === $this->accountManager) {
            $this->accountManager = new AccountManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->accountManager->setHost($this->host);
        }
        return $this->accountManager;
    }

    /**
     * @var CallbackManager
     */
    private $callbackManager;

    /**
     * Интерфейс для работы со справочниками
     *
     * @return CallbackManager
     */
    public function getCallbackManager()
    {
        if (null === $this->callbackManager) {
            $this->callbackManager = new CallbackManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->callbackManager->setHost($this->host);
        }
        return $this->callbackManager;
    }

    /**
     * @var DocumentExportManager
     */
    private $documentExportManager;

    /**
     * Интерфейс для работы с экспортом документов
     *
     * @return DocumentExportManager
     */
    public function getDocumentExportManager()
    {
        if (null === $this->documentExportManager) {
            $this->documentExportManager = new DocumentExportManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->documentExportManager->setHost($this->host);
        }
        return $this->documentExportManager;
    }

    /**
     * @var DocumentManager
     */
    private $documentManager;

    /**
     * Интерфейс для работы с документами
     *
     * @return DocumentManager
     */
    public function getDocumentManager()
    {
        if (null === $this->documentManager) {
            $this->documentManager = new DocumentManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->documentManager->setHost($this->host);
        }
        return $this->documentManager;
    }

    /**
     * @var TranslationMemoriesManager
     */
    private $translationMemoriesManager;

    /**
     *
     * @return TranslationMemoriesManager
     */
    public function getTranslationMemoriesManager()
    {
        if (null === $this->translationMemoriesManager) {
            $this->translationMemoriesManager = new TranslationMemoriesManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->translationMemoriesManager->setHost($this->host);
        }
        return $this->translationMemoriesManager;
    }

    /**
     * @var ClientManager
     */
    private $clientManager;

    /**
     *
     * @return ClientManager
     */
    public function getClientManager()
    {
        if (null === $this->clientManager) {
            $this->clientManager = new ClientManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->clientManager->setHost($this->host);
        }
        return $this->clientManager;
    }

    /**
     * @var InvoiceManager
     */
    private $invoiceManager;

    /**
     *
     * @return InvoiceManager
     */
    public function getInvoiceManager()
    {
        if (null === $this->invoiceManager) {
            $this->invoiceManager = new InvoiceManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->invoiceManager->setHost($this->host);
        }
        return $this->invoiceManager;
    }

    /**
     * @var PlaceholderFormatApiManager
     */
    private $placeholderFormatApiManager;

    /**
     *
     * @return PlaceholderFormatApiManager
     */
    public function getPlaceholderFormatApiManager()
    {
        if (null === $this->placeholderFormatApiManager) {
            $this->placeholderFormatApiManager = new PlaceholderFormatApiManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->placeholderFormatApiManager->setHost($this->host);
        }
        return $this->placeholderFormatApiManager;
    }

    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * @return UserManager
     */
    public function getUserManager()
    {
        if (null === $this->userManager) {
            $this->userManager = new UserManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->userManager->setHost($this->host);
        }
        return $this->userManager;
    }

    /**
     * @var GlossaryManager
     */
    private $glossaryManager;

    /**
     * @return GlossaryManager
     */
    public function getGlossaryManager()
    {
        if (null === $this->glossaryManager) {
            $this->glossaryManager = new GlossaryManager($this->httpClient, $this->messageFactory, $this->serializer);
            $this->glossaryManager->setHost($this->host);
        }
        return $this->glossaryManager;
    }
}
