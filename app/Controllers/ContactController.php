<?php

/**
 * Description of ContactController
 *
 * @author pragan
 */
use Illuminate\Http\Request;
use Repositories\ContactRepository;

class ContactController extends Controller {

    /**
     * The Contact repository implementations.
     *
     * @var ContactRepository
     */
    protected $contact;

    /**
     * Constructor.
     *
     * @param ContactRepository $contact
     */
    public function __construct(ContactRepository $contact) {
        $this->beforeFilter('auth', array('except' => 'getLogin'));

        $this->contact = $contact;
    }

    /**
     * Index page of contact.
     *
     * @return void
     */
    public function index() {
        $contacts = $this->contact->all();

        if (is_null($contacts)) {
            App::abort('404');
        }

        return $contacts;
    }

    /**
     * Store contact.
     *
     * @return void
     */
    public function create() {
        // Inputs
        $name = Input::get('name');
        $phone = Input::get('phone');
        $address = Input::get('address');
        $email = Input::get('email');

        // Validation
        $messages = $this->contact->validateCreate($name, $phone, $address, $email);

        if (count($messages->errors()) > 0) {

            return Response::json(array('success' => false, 'message' => $messages->errors()));
        }

        //Attempt Update
        try {
            $contact = $this->contact->store($name, $phone, $address, $email);
            $messages = 'Contact ' . $contact->name . ' has been created.';
            return Response::json(array('success' => true, 'message' => $messages));
        } catch (\Exception $e) {
            return Redirect::back()
                            ->withInput()
                            ->with('message_error', $e->getMessage());
        }
    }

    /**
     * Show product dealer.
     *
     * @param int $id
     *
     * @return void
     */
    public function show($id = null) {
        $contactData = $this->contact->show($id);

        if (is_null($contactData)) {
            App::abort('404');
        }

        return $contactData;
    }

    /**
     * Update contact.
     *
     * @param int $id
     *
     * @return void
     */
    public function update($id = null) {
        // Inputs
        $name = Input::get('name');
        $phone = Input::get('phone');
        $address = Input::get('address');
        $email = Input::get('email');

        // Validation
        $messages = $this->contact->validateUpdate($id, $name, $phone, $address, $email);

        if (count($messages->errors()) > 0) {
            return Response::json(array('success' => false, 'message' => $messages->errors()));
        }

        //Attempt Update
        try {
            $contact = $this->contact->update($id, $name, $phone, $address, $email);
            $messages = 'Contact ' . $contact->name . ' has been update.';
            return Response::json(array('success' => true, 'message' => $messages));
        } catch (\Exception $e) {
            return Redirect::back()
                            ->withInput()
                            ->with('message_error', $e->getMessage());
        }
    }

    /**
     * Delete contact.
     *
     * @param int $id
     *
     * @return void
     */
    public function destroy($id = null) {
        //Attempt Delete
        try {
            $contact = $this->contact->delete($id);
            $message = 'Contact ' . $contact->name . ' has been deleted.';
            return Response::json(array('success' => true, 'message' => $message));
        } catch (\Exception $e) {
            return Redirect::back()
                            ->withInput()
                            ->with('message_error', $e->getMessage());
        }
    }

    /**
     * Search contacts by name.
     *
     * @return void
     */
    public function searchName() {
        $name = Input::get('name');
        $contacts = $this->contact->searchName($name);

        return View::make('home', compact('contacts'));
    }

}
