<?php
App::uses('AppController', 'Controller');
App::uses('File', 'Utility');
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
			'conditions' => array('Book.slug'=> $slug),
			'contain' => array(
				'Writer'=>array('name', 'slug')
			)
		);
		$book = $this->Book->find('first', $options);
		if (empty($book)) {
			throw new NotFoundException(__('Không có quyển sách này !'));
		}
		$this->set('book', $book);

		//comment
		$this->loadModel('Comment');
		$comments = $this->Comment->find('all',array(
			'conditions'=>array(
				'book_id' => $book['Book']['id']
			),
			'order'=>array('Comment.created'=>'asc'),
			'contain'=> array(
				'User' =>array('username')
			)
		));
		//pr($comment);
		$this->set('coments', $comments);

		//related books
		$related_books = $this->Book->find('all', array(
			'fields'=> array('title', 'image', 'sale_price', 'slug'),
			'conditions'=>array(
				'category_id'=>$book['Book']['category_id'],
				'Book.id <>' =>$book['Book']['id'],
				'published' =>1
			),
			'limit' => 5,
			'order' => 'rand()',
			'contain'=> array(
				'Writer'=> array('name', 'slug')
			)
		));

		$this->set('related_books', $related_books);

		if($this->Session->check('comment_errors')){
			$errors = $this->Session->read('comment_errors');
			$this->set('errors', $errors);
			$this->Session->delete('comment_errors');
		}

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
			$this->loadModel('Category');
			$categories = $this->Category->findById($this->request->data['Book']['category_id']);
			if(!$this->uploadFile($category['Category']['folder'])){
				$location = '/files/'.$category['Category']['folder'].'/'.$this->request->data['Book']['image']['name'].
				$this->request->data['Book']['image'] = $location;

			}else {
				$this->Session->setFlash(__('Khoong up duoc.'));
			}
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
	 * @param null $folder
	 */
	private function uploadFile($folder = null){
	$file = new File($this->request->data['Book']['image']['tmp_name']);
		$file_name = $this->request->data['Book']['image']['name'];
		if($file->copy(APP.'webroot/files/'.$folder.'/'.$file_name)){
			return true;
		}else {
			return false;
		}
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

	public function testup(){
		if(!empty( $this->request->data)){
			$file = $this->data['Book']['image'];
			move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads' . $file['name']);
		}
	}

	public function search(){
		$notFound = false;
		if($this->request->is('post')){
			$this->Book->set($this->request->data);
			if($this->Book->validates()){
				$keyword = $this->request->data['Book']['keyword'];
				$books = $this->Book->find('all', array(
					'fields' => array('title', 'image', 'sale_price', 'slug'),
					'contain' => array('Writer.name', 'Writer.slug'),
					'order' => array('Book.created'=>'desc'),
					'conditions' => array(
						'published' => 1,
						'or' => array(
							'title like' => '%'.$keyword.'%',
							'Writer.name like' => '%'.$keyword.'%',
						)
					),
					'joins' => array(
						array(
							'table'=> 'books_writers',
							'alias'=>'BookWriter',
							'conditions' => 'BookWriter.book_id = Book.id'
						),
						array(
							'table'=> 'writers',
							'alias'=> 'Writer',
							'conditions' => 'BookWriter.writer_id = Writer.id'
						)
					)
				));
				if(!empty($books)){
					$this->set('results', $books);
				} else {
					$notFound = true;
				}
			} else {
				$errors = $this->Book->validationErrors;
				$this->set('errors', $errors);
			}


		}
		$this->set('notFound', $notFound);
	}


//	public function update_comment(){
//		$books = $this->Book->find('all', array(
//			'fields' => 'id',
//			'contain' => 'Comment'
//		));
//		//pr($book);
//		foreach($books as $book){
//			if(count($book['Comment'])>0){
//				$this->Book->updateAll(
//					array('comment_count'=>count($book['Comment'])),
//					array('Book.id'=>$book['Book']['id'])
//				);
//			};
//		}
//	}
}



