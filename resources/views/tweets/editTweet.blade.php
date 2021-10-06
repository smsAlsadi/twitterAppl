@extends('layouts.app')

<div class="content">
    
    <form action="/edittimeline" method="POST">
        @csrf
        <textarea  name="text"  class="form-control" id="" cols="30" rows="4"></textarea>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</div>