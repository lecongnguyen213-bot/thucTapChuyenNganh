@extends('layout.admin')

@section('body')
<div class="container-fluid mt-4">

    <h3 class="mb-4">📊 Dashboard 1 – Data Overview</h3>

    <!-- ===== STAT BOX ===== -->
    <div class="row">

        <div class="col-md-3">
            <div class="card text-bg-primary shadow-sm">
                <div class="card-body">
                    <h6>Total Categories</h6>
                    <h2>{{ $totalCategories }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-success shadow-sm">
                <div class="card-body">
                    <h6>Total Products</h6>
                    <h2>{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-info shadow-sm">
                <div class="card-body">
                    <h6>Active Products</h6>
                    <h2>{{ $activeProducts }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-danger shadow-sm">
                <div class="card-body">
                    <h6>Inactive Products</h6>
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
                    Top Categories by Product
                </div>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Total Products</th>
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
