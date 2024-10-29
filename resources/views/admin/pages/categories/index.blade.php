@extends('admin.layouts.master')

@section('title', $viewData['title'])

@section('page-style')
    <link href="{{ asset('admin/css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <style>
        .modal-header .close {
            margin-top: -18px;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $viewData['title_page'] }}</h1>
                <button id="createNewCategory" class="btn btn-success">Create New Category</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">DataTables Advanced Tables</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-success editCategoryBtn" data-value="{{ $category }}">Edit</button>
                                                <button class="btn btn-sm btn-danger deleteCategoryBtn" data-id="{{ $category->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Create and Edit -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        @csrf
                        <input type="hidden" id="categoryId" name="id">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-scripts')
    <script src="{{ asset('admin/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Handel Create
            $(document).on('click', '#createNewCategory', function() {
                $('#categoryForm')[0].reset();  // Reset the form
                $('#categoryId').val('');  // Clear the hidden category ID
                $('#categoryModalLabel').text('Create Category');
                $('#categoryModal').modal('show'); 
            });

            // Handel Edit
            $(document).on('click', '.editCategoryBtn', function() {
                const categoryData = $(this).data('value');
                $('#categoryId').val(categoryData.id);
                $('#name').val(categoryData.name);
                $('#slug').val(categoryData.slug);
                $('#categoryModalLabel').text('Edit Category');
                $('#categoryModal').modal('show');       
            });

            // Handel Delete
            $(document).on('click', '.deleteCategoryBtn', function() {
                const categoryId = $(this).data('id');
                if (confirm('Bạn có muốn xoá?')) {
                    $.ajax({
                        url: `{{ route('categories.destroy', '') }}/${categoryId}`,
                        method: 'DELETE',
                        data: categoryId,
                        success: function(response) {
                            alert('Category updated successfully!');
                            $('#categoryModal').modal('hide');
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert('Error updating category. Please try again.');
                        }
                    });
                }
                else {
                    event.preventDefault();
                }
            });

            // Close model
            $(document).on('click', '#closeModal', function() {
                $('#categoryForm')[0].reset(); // Reset the form on modal close
            });

            // Handel submit
            $("#categoryForm").on("submit", function(event) {
                event.preventDefault();
                const formData = $(this).serialize();
                const categoryId = $("#categoryId").val();

                // Send AJAX request to create or update category
                if (categoryId) {
                    $.ajax({
                        url: `{{ route('categories.update', '') }}/${categoryId}`,
                        method: 'PUT',
                        data: formData,
                        success: function(response) {
                            alert('Category updated successfully!');
                            $('#categoryModal').modal('hide');
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert('Error updating category. Please try again.');
                        }
                    });
                } else {
                    $.ajax({
                        url: '{{ route('categories.store') }}',
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            alert('Category created successfully!');
                            $('#categoryModal').modal('hide');
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert('Error creating category. Please try again.');
                        }
                    });
                }
            });
        });
    </script>
@stop
