@props(['tableName' => 'Tabel Data'])

<h3 class="card-title">{{ isset($tableName) ? $tableName : 'Tabel Data' }}</h3>
<div class="card-tools">
    <!-- This will cause the card to maximize when clicked -->
    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    <!-- This will cause the card to collapse when clicked -->
    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
</div>
