<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">

                        <!-- 404 Error Text -->
                        <div class="text-center">
                            <div class="error mx-auto" data-text="403">403</div>
                            <p class="lead text-gray-800 mb-5">Access Forbidden</p>
                            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                            <a href="<?= base_url('Admin'); ?>">&larr; Back to Dashboard</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


</main><!-- End #main -->