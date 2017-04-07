<?php
App::uses('AppController', 'Controller');
/**
 * Books Controller
 *
 * @property Book $Book
 * @property PaginatorComponent $Paginator
 */
class BooksController extends AppController {

	//public $components = array('Paginator');



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
		//$this->Book->recursive = 0;
		//$this->set('books', $this->Paginator->paginate());
		$books = $this->Book->latest();
		//pr($books); exit();
		$this->set('books', $books);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($slug = null) {
		$options = array(
			'conditions' => array('Book.slug'=> $slug)
		);
		$book = $this->Book->find('first', $options);
		if (empty($book)) {
			throw new NotFoundException(__('Không có quyển sách này !'));
		}
		$this->set('book', $book);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Book->create();
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
			$this->request->data = $this->Book->find('first', $options);
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Book->delete()) {
			$this->Session->setFlash(__('The book has been deleted.'));
		} else {
			$this->Session->setFlash(__('The book could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * function truyvan
	 */

	public function truyvan(){
		$book = $this->Book->find('first', array(
			'fields' => array('id', 'title'),
			'contain' => 'Writer',
		));
		echo '<meta charset="UTF-8">';
		pr($book);
		exit;
	}

	/**
	 * latest_book
	 * list and paginate books page
	 *
	 */

	public function latest_books(){
		$this->paginate = array(
			'limit'=>5,
			'contain'=>array(
				'Category'=>array(
					'fields'=>'name'
				),
				'Writer'=>array('fields'=>array('name', 'slug'))
			),
			'paramType'=> 'querystring'
		);
		$books = $this->paginate();
		$this->set('books', $books);
	}
}



