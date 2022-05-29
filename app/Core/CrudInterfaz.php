<?php

namespace App\Core;

use Illuminate\Http\Request;

interface CrudInterfaz {
    public function index(Request $request);

    public function show($id);

    public function store(Request $request);

    public function update($id, Request $request);

    public function destroy($id, Request $request);

}
