<?php
App::uses('Suggestion', 'Model');

/**
 * Suggestion Test Case
 *
 */
class SuggestionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.suggestion');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Suggestion = ClassRegistry::init('Suggestion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Suggestion);

		parent::tearDown();
	}

}
