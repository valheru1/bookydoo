@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" action="/books/{{ $book->id }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
            <div class="left">
                <div class="form-group">
                    
                    <p><label for="Title">Title</label>

                    <input type="text" id="title" name="title" class="title" value="{{ $book->title }}"></br>
                    </p>
                </div>
                <div class="form-group">
                    <input type="hidden" name="author_id" value="{{ $author_id}}">
                    <!-- <input type="hidden" name="content" value="Add the content of your book"> -->
                    <p><label for="published">Publish</label>&nbsp<input type="checkbox" name="published" value="0"></p>
                    <br />
                	<label for="description">Description </label>
                    <span class="count1">1000</span><br />
                    <textarea class="description" name="description" maxlength="1000">{{ $book->description }}</textarea>
                </div>
            </div>
            <div class="rigth item text-center">
                
                <p>Choose categories, which will describe your book: <span class="count">3</span></p>
                <div class="form-group">
                    <table class="text-center categories" align="center">
                    <tr>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="comedy" @if ($book->comedy === 1) checked @endif ></td>
                        <td class="category">comedy</td>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="fantasy"  @if ($book->fantasy === 1) checked @endif ></td>
                        <td class="category">fantasy</td>
                    </tr>
                    <tr>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="for_kids"  @if ($book->for_kids === 1) checked @endif ></td>
                        <td class="category">for kids</td>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="history"  @if ($book->history === 1) checked @endif ></td>
                        <td class="category">history</td>
                    </tr>
                    <tr>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="moral"  @if ($book->moral === 1) checked @endif ></td>
                        <td class="category">moral</td>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="philosophy"  @if ($book->philosophy === 1) checked @endif ></td>
                        <td class="category">philosophy</td>
                    </tr>
                    <tr>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="religious"  @if ($book->religious === 1) checked @endif ></td>
                        <td class="category">religious</td>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="report"  @if ($book->report === 1) checked @endif ></td>
                        <td class="category">report</td>
                    </tr>
                    <tr>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="romance"  @if ($book->romance === 1) checked @endif ></td>
                        <td class="category">romance</td>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="thriller"  @if ($book->thriller === 1) checked @endif ></td>
                        <td class="category">thriller</td>
                    </tr>
                    <tr>
                        <td class="checkbox_field"><input type="checkbox" class="category" name="youth"  @if ($book->youth === 1) checked @endif ></td>
                        <td class="category">youth</td></tr>
                    </table>
            </div>
            
        </div>

    </div>
    <div class="item text-center">
                <button type="submit" class="btn btn-primary">Save changes</button>
                
            </div>
    </form>
</div>
@endsection