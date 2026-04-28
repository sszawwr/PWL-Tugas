<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- Table with stripped rows -->
              <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns"><div class="datatable-top">
    <div class="datatable-dropdown">
            <label>
                <select class="datatable-selector"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select> entries per page
            </label>
        </div>
    <div class="datatable-search">
            <input class="datatable-input" placeholder="Search..." type="search" title="Search within table">
        </div>
</div>
<div class="datatable-container"><table class="table datatable datatable-table"><thead><tr><th data-sortable="true" style="width: 5.7053941908713695%;"><a href="#" class="datatable-sorter">#</a></th><th data-sortable="true" style="width: 28.008298755186722%;"><a href="#" class="datatable-sorter">Name</a></th><th data-sortable="true" style="width: 37.75933609958506%;"><a href="#" class="datatable-sorter">Position</a></th><th data-sortable="true" style="width: 9.232365145228217%;"><a href="#" class="datatable-sorter">Age</a></th><th data-sortable="true" style="width: 19.294605809128633%;"><a href="#" class="datatable-sorter">Start Date</a></th></tr></thead><tbody><tr data-index="0"><td>1</td><td>Brandon Jacob</td><td>Designer</td><td>28</td><td>2016-05-25</td></tr><tr data-index="1"><td>2</td><td>Bridie Kessler</td><td>Developer</td><td>35</td><td>2014-12-05</td></tr><tr data-index="2"><td>3</td><td>Ashleigh Langosh</td><td>Finance</td><td>45</td><td>2011-08-12</td></tr><tr data-index="3"><td>4</td><td>Angus Grady</td><td>HR</td><td>34</td><td>2012-06-11</td></tr><tr data-index="4"><td>5</td><td>Raheem Lehner</td><td>Dynamic Division Officer</td><td>47</td><td>2011-04-19</td></tr></tbody></table></div>
<div class="datatable-bottom">
    <div class="datatable-info">Showing 1 to 5 of 5 entries</div>
    <nav class="datatable-pagination"><ul class="datatable-pagination-list"></ul></nav>
</div></div>
              <!-- End Table with stripped rows -->
<?= $this->endSection() ?>