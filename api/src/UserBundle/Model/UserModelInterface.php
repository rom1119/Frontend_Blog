<?php

namespace UserBundle\Model;


interface UserModelInterface {
	public function create($data, $validator);

	public function delete($email);

	public function update($email);

	public function readAll();
}