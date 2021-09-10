<?php

return [
    "index" => "HomeController@index",

    // Tasks
    "runTask" => "TaskController@runTask",
    "checkTask" => "TaskController@checkTask",

    // Hostname Settings
    "get_hostname" => "HostnameController@get",
    "set_hostname" => "HostnameController@set",

    // Username Settings
    "get_username" => "UsernameController@get",

    // Systeminfo
    "get_system_info" => "SystemInfoController@get",
    "install_lshw" => "SystemInfoController@install",

    // Runscript
    "run_script" => "RunScriptController@run",

    // TaskView
    "example_task" => "TaskViewController@run",

    //Taskmanager
    "task_manager_list" => "TaskManagerController@getList",
    "get_file_location" => "TaskManagerController@getFileLocation",
    "get_status" => "TaskManagerController@getStatus",
    "kill_pid" => "TaskManagerController@killPid",
    "get_proccess_tree" => "TaskManagerController@getProcessTree",
    "kill_all_proccess" => "TaskManagerController@killAllProccess",
    "get_command_arguments" => "TaskManagerController@getCommandArguemnts",

    // list controller
    "extension_list" => "ListController@getExtensionList",
    "delete_file" => "ListController@deleteFile"
    
];
