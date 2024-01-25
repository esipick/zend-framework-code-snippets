use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as DbTableAuthAdapter;

// Set up authentication adapter
$authAdapter = new DbTableAuthAdapter($dbAdapter);
$authAdapter->setTableName('users')
            ->setIdentityColumn('username')
            ->setCredentialColumn('password');

// Set credentials
$authAdapter->setIdentity($username)->setCredential($password);

// Authenticate
$auth = new AuthenticationService();
$result = $auth->authenticate($authAdapter);

if ($result->isValid()) {
    // Authentication successful
    $user = $authAdapter->getResultRowObject();
    $auth->getStorage()->write($user);
} else {
    // Authentication failed
    $messages = $result->getMessages();
    foreach ($messages as $message) {
        echo "$message\n";
    }
}
