<?php

namespace UserBundle\Model;


interface UserModelInterface {
	public function create($data);

	public function delete($email);

	public function update($email);

	public function readAll();
}