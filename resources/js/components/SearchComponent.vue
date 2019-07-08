<template>
    <div class="row my-3">
        <div class="col-12 col-md-4 offset-md-8 my-md-4">
            <form action="index.php/hike" method="post" class="input-group d-flex justify-content-center">
                <input type="text" class="font-weight-bold form-control col-2 col-md-3" id="searchMin" name="searchMin" placeholder="Min.." maxlength="8">
                <input type="text" class="font-weight-bold form-control col-2 col-md-3" id="searchMax" name="searchMax" placeholder="Max.." maxlength="8">
                <select id="inputGroupSelect04" class="custom-select col-4 col-md-4" name="dbColumns">
                    <option selected>Choose..</option>
                    <option value="1">Duration</option>
                    <option value="2">Distance</option>
                    <option value="3">Avg Speed</option>
                    <option value="4">Kcal</option>
                    <option value="5">Steps</option>
                    <option value="6">Week</option>
                    <option value="7">Month</option>
                </select>
                <div class="input-group-append col-2 col-md-3 p-0">
                    <button type="submit" name="submitSearch" class="btn btn-secondary">Search</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
