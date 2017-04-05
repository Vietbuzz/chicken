<?php
App::uses('AppController', 'Controller');
/**
 * BooksWriters Controller
 *
 * @property BooksWriter $BooksWriter
 * @property PaginatorComponent $Paginator
 */
class BooksWritersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BooksWriter->recursive = 0;
		$this->set('booksWriters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BooksWriter->exists($id)) {
			throw new NotFoundException(__('Invalid books writer'));
		}
		$options = array('conditions' => array('BooksWriter.' . $this->BooksWriter->primaryKey => $id));
		$this->set('booksWriter', $this->BooksWriter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BooksWriter->create();
			if ($this->BooksWriter->save($this->request->data)) {
				$this->Session->setFlash(__('The books writer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The books writer could not be saved. Please, try again.'));
			}
		}
		$books = $this->BooksWriter->Book->find('list');
		$writers = $this->BooksWriter->Writer->find('list');
		$this->set(compact('books', 'writers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BooksWriter->exists($id)) {
			throw new NotFoundException(__('Invalid books writer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BooksWriter->save($this->request->data)) {
				$this->Session->setFlash(__('The books writer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The books writer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BooksWriter.' . $this->BooksWriter->primaryKey => $id));
			$this->request->data = $this->BooksWriter->find('first', $options);
		}
		$books = $this->BooksWriter->Book->find('list');
		$writers = $this->BooksWriter->Writer->find('list');
		$this->set(compact('books', 'writers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BooksWriter->id = $id;
		if (!$this->BooksWriter->exists()) {
			throw new NotFoundException(__('Invalid books writer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BooksWriter->delete()) {
			$this->Session->setFlash(__('The books writer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The books writer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
