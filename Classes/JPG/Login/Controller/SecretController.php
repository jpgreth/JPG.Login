<?php
namespace JPG\Login\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "JPG.Login".             *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use JPG\Login\Domain\Model\Secret;

class SecretController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \JPG\Login\Domain\Repository\SecretRepository
	 */
	protected $secretRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('secrets', $this->secretRepository->findAll());
	}

	/**
	 * @param \JPG\Login\Domain\Model\Secret $secret
	 * @return void
	 */
	public function showAction(Secret $secret) {
		$this->view->assign('secret', $secret);
	}

	/**
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * @param \JPG\Login\Domain\Model\Secret $newSecret
	 * @return void
	 */
	public function createAction(Secret $newSecret) {
		$this->secretRepository->add($newSecret);
		$this->addFlashMessage('Created a new secret.');
		$this->redirect('index');
	}

	/**
	 * @param \JPG\Login\Domain\Model\Secret $secret
	 * @return void
	 */
	public function editAction(Secret $secret) {
		$this->view->assign('secret', $secret);
	}

	/**
	 * @param \JPG\Login\Domain\Model\Secret $secret
	 * @return void
	 */
	public function updateAction(Secret $secret) {
		$this->secretRepository->update($secret);
		$this->addFlashMessage('Updated the secret.');
		$this->redirect('index');
	}

	/**
	 * @param \JPG\Login\Domain\Model\Secret $secret
	 * @return void
	 */
	public function deleteAction(Secret $secret) {
		$this->secretRepository->remove($secret);
		$this->addFlashMessage('Deleted a secret.');
		$this->redirect('index');
	}

}

?>