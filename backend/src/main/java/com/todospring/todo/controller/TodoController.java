package com.todospring.todo.controller;

import java.util.List;

import org.springframework.web.bind.annotation.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import com.todospring.todo.model.Todo;
import com.todospring.todo.repository.TodoRepository;


@RestController
@RequestMapping("api/todos")
@CrossOrigin(origins = "*")
public class TodoController {
    @Autowired
    private TodoRepository todoRepository;

    @GetMapping
    public List<Todo> getAllTodos(){
        return todoRepository.findAll();
    }

    @PostMapping
    public Todo createTodo(@RequestBody Todo todo) {
        return todoRepository.save(todo);
    }

    //Tutaj PUT

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteTodo(@PathVariable Long id){
        return todoRepository.findById(id).map(
            todo -> {
                todoRepository.delete(todo);
                return ResponseEntity.ok().<Void>build();
            }
        ).orElse(ResponseEntity.notFound().build());
    }
}
