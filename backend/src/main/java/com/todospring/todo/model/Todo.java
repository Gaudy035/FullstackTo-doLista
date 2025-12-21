package com.todospring.todo.model;
import java.time.LocalDate;

import jakarta.persistence.*;;

@Entity
@Table(name = "todos")
public class Todo {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;
    
    @Column(nullable = false)
    private String name;
    
    private String desc;

    private LocalDate date;

    private boolean comp;

    public Todo(){}

    public Todo(String s_name, String s_desc, LocalDate s_date){
        this.name = s_name;
        this.desc = s_desc;
        this.date = s_date;
        this.comp = false;
    }

    public long getId(){
        return this.id;
    }
    public void setId(long new_id){
        this.id = new_id;
    }
    
    public String getName(){
        return this.name;
    }
    public void setName(String new_name){
        this.name = new_name;
    }
    
    public String getDesc(){
        return this.desc;
    }
    public void setDesc(String new_desc){
        this.desc = new_desc;
    }
    
    public LocalDate getDate(){
        return this.date;
    }
    public void setDate(LocalDate new_date){
        this.date = new_date;
        
    }

    public boolean getComp(){
        return this.comp;
    }
    public void setComp(boolean new_comp){
        this.comp = new_comp;
    }
    
}
