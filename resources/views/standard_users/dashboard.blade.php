@extends('layouts.standard')

@section('content')
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-sm-6">
                    <h1 class="m-0">Standard User Dashboard</h1>
                </div><!-- /.col -->
                <div>
                    <form action="{{ route('standard.students.search') }}" method="GET" class="form-inline position-relative">
                        <input type="text" name="query" class="form-control" placeholder="Search by ID or name">
                        <button type="submit" class="btn position-absolute" style="right: 0; top: 0; border-radius: 0; background-color: transparent;">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">


        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12">
                    <div id="announcementCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($announcements as $index => $announcement)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="carousel-title">{{ $announcement->title }}</h5>
                                            <div class="carousel-subtitle">
                                                <span class="announcement-date">Date: {{ $announcement->created_at->format('F j, Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="carousel-content">{{ $announcement->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="carousel-controls">
                            <a class="carousel-control-prev" href="#announcementCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <div class="carousel-indicators">
                                @foreach ($announcements as $index => $announcement)
                                    <span data-target="#announcementCarousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></span>
                                @endforeach
                            </div>
                            <a class="carousel-control-next" href="#announcementCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->

    </section>
    <!-- /.content -->
</div>
@endsection
