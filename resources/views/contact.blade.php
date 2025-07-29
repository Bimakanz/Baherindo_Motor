@extends('layouts.main')

@section('content')
<div class="container" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
    <h1 style="text-align: center;">Contact Us</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required style="width: 100%; padding: 10px; margin-bottom: 10px;">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required style="width: 100%; padding: 10px; margin-bottom: 10px;">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required style="width: 100%; padding: 10px; margin-bottom: 10px;"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px;">Send Message</button>
    </form>
</div>
@endsection