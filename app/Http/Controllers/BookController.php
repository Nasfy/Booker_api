<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Book;
use App\Http\Requests\BookRequest;

class BookController extends ApiControllers
{
    public function __construct(Book $model) {
        $this->model = $model;
    }

    public function get_author($author) {
        $author = str_replace('_', ' ', $author);
        $entity = $this->model->get()->where('author', $author);
        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }
        return $this->sendResponse($entity, 'OK',200);
    }

    public function get_user() {
        $user = JWTAuth::parseToken()->authenticate();
        $entity = $this->model->get()->where('user', $user['id']);
        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }
        return $this->sendResponse($entity, 'OK',200);
    }

    public function put(BookRequest $request) {
        $book = new Book;
        $user = JWTAuth::parseToken()->authenticate();
        $imagedata = file_get_contents($request->input('cover'));
        $book->user = $user['id'];
        $book->title = $request->input("title");
        $book->pages = $request->input("pages");
        $book->annotation = $request->input("annotation");
        $book->cover = base64_encode($imagedata);
        $book->author = $request->input("author");
        $book->save();
        return $this->sendResponse(null, 'Book added', 201);
   }

    public function update(int $entityId, BookRequest $request) {
        $user = JWTAuth::parseToken()->authenticate();
        $entity = $this->model->find($entityId);

        if ($user['id'] == $entity['user']) {
            $imagedata = file_get_contents($request->input('cover'));
            $entity->user = $user['id'];
            $entity->title = $request->input("title");
            $entity->pages = $request->input("pages");
            $entity->annotation = $request->input("annotation");
            $entity->cover = base64_encode($imagedata);
            $entity->author = $request->input("author");
            $entity->save();
            return $this->sendResponse(null, 'OK',204);
        }
        else {
            return $this->sendError('Not your book', 404);
        }
    }

    public function delete(int $entityId) {
        $user = JWTAuth::parseToken()->authenticate();
        $entity = $this->model->find($entityId);

        if ($user['id'] == $entity['user']) {
            $entity->delete();
            return $this->sendResponse(null, 'OK',204);
        }
        else {
            return $this->sendError('Not your book', 404);
        }
    }
 }
