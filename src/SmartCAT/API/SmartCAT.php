<?php
namespace SmartCAT\API;
use SmartCAT\API\Normalizer\NormalizerFactory;
use SmartCAT\API\Manager\ProjectManager;
use SmartCAT\API\Manager\DirectoriesManager;
use SmartCAT\API\Manager\DocumentExportManager;
use SmartCAT\API\Manager\DocumentManager;
use SmartCAT\API\Manager\AccountManager;
use SmartCAT\API\Manager\CallbackManager;

use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Http\Message\Authentication\BasicAuth;
use Http\Client\Common\PluginClient;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\ContentLengthPlugin;
use Http\Client\Common\Plugin\DecoderPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Socket\Client as SocketHttpClient;
use Joli\Jane\Runtime\Encoder\RawEncoder;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class SmartCAT
{
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
     * @param HttpClient|null     $httpClient     Http client to use with Docker
     * @param Serializer|null     $serializer     Deserialize docker response into php objects
     * @param MessageFactory|null $messageFactory How to create docker request (in PSR7)
     */
    public function __construct($login, $password)
    {
        $this->login=$login;
        $this->password=$password;
        $serializer = new Serializer(
            NormalizerFactory::create(),
            [
                new JsonEncoder(
                    new JsonEncode(),
                    new JsonDecode()
                ),
                new RawEncoder()
            ]
        );
        $messageFactory = new MessageFactory\GuzzleMessageFactory();
        $this->serializer = $serializer;
        $this->messageFactory = $messageFactory;
        $options = [
            'remote_socket' => 'tcp://smartcat.ai:443',
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
        }
        return $this->documentManager;
    }

}