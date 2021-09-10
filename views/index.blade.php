@extends('layouts.master')

@section('content')
<h2 class="text-bold">{{ __("Liman Eğitim Kampı, Nesne Yönelimli Eklenti Geliştirme") }}</h2>

<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active" onclick="getHostname()" href="#hostname" data-toggle="tab">
            <i class="fas fa-server"></i> {{ __("Hostname") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="getSystemInfo()" href="#systemInfo" data-toggle="tab">
            <i class="fas fa-info"></i> {{ __("Sistem Bilgileri") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="runScript()" href="#runScript" data-toggle="tab">
            <i class="fab fa-python"></i> {{ __("Python Betiği") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="taskView()" href="#taskView" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Task Ekranı") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="sandbox()" href="#sandbox" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Sandbox Elemanları") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="getUsername()" href="#username" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Ben kimim?") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="taskManager()" href="#task" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Görev yöneticisi") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="extensionList()" href="#extensionlist" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Eklenti listesi") }}
        </a>
    </li>
</ul>

<div class="tab-content">
    <div id="hostname" class="tab-pane active">
        @include('hostname.main')
    </div>
    
    <div id="username" class="tab-pane">
        @include('username.main')
    </div>

    <div id="systemInfo" class="tab-pane">
        @include('systeminfo.main')
    </div>

    <div id="runScript" class="tab-pane">
        @include('runscript.main')
    </div>

    <div id="taskView" class="tab-pane">
        @include('taskview.main')
    </div>

    <div id="sandbox" class="tab-pane">
        @include('sandbox.main')
    </div>

    <div id="task" class="tab-pane">
        @include('taskmanager.main')
    </div>

    <div id="extensionlist" class="tab-pane">
        @include('extensionlist.main')
    </div>
</div>
@endsection