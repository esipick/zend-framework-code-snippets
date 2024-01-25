use Zend\Form\Form;
use Zend\Form\Element;

// Create a form
$form = new Form();
$form->add(new Element\Text('username', ['label' => 'Username']));
$form->add(new Element\Password('password', ['label' => 'Password']));
$form->add(new Element\Submit('submit', ['value' => 'Login']));

// Handle form submissions
if ($this->getRequest()->isPost()) {
    $data = $this->params()->fromPost();
    $form->setData($data);

    if ($form->isValid()) {
        // Process valid form data
        $username = $form->get('username')->getValue();
        $password = $form->get('password')->getValue();
        // Perform authentication or other actions
    }
}
