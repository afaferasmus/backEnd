  <form method="post" action="{{url('admin/questionimg')}}" enctype='multipart/form-data'>
            @csrf
                <label for="question" class="form-label">Question:</label>
                <input type="text" class="form-control" id="question" name="question" placeholder="Question" required>
                <label for="correct" class="form-label">Correct:</label>
                <select class="form-control" id="correct" name="correct" required>
                        <option value='1'>True</option>
                        <option value='0'>False</option>

                </select>
                <label for="question" class="form-label">Noticia real:</label>
                <input type="text" class="form-control" id="realNew" name="realNew" placeholder="realnew" required>
                <input type="file" class="form-control" id="img" name="img" placeholder="">
            <button type="submit" class="btn btn-primary">Save question</button>
        </form>
        
       