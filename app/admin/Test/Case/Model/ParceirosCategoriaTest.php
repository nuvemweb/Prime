<?php
App::uses('ParceirosCategoria', 'Model');

/**
 * ParceirosCategoria Test Case
 *
 */
class ParceirosCategoriaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.parceiros_categoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ParceirosCategoria = ClassRegistry::init('ParceirosCategoria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ParceirosCategoria);

		parent::tearDown();
	}

}
