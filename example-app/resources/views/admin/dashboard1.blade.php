@extends('layout.admin')

@section('body')
<div class="container-fluid mt-4">

    <h3 class="mb-4">📊Data - Analyst</h3>

    <!-- ===== STAT BOX ===== -->
    <div class="row">

        <div class="col-md-3">
            <div class="card text-bg-primary shadow-sm">
                <div class="card-body">
                    <h6>Total Author</h6>
                    <h2>{{ $totalCategories }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-success shadow-sm">
                <div class="card-body">
                    <h6>Total Books</h6>
                    <h2>{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-info shadow-sm">
                <div class="card-body">
                    <h6>Active Books</h6>
                    <h2>{{ $activeProducts }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-danger shadow-sm">
                <div class="card-body">
                    <h6>Inactive Books</h6>
                    <h2>{{ $inactiveProducts }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- ===== TOP CATEGORY ===== -->
    <div class="row mt-4">

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    List detail
                </div>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Author</th>
                            <th>Total Books</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topCategories as $cat)
                            <tr>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->product_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection
