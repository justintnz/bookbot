<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'service' => [
        'title' => 'Services',

        'actions' => [
            'index' => 'Services',
            'create' => 'New Service',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'code' => 'Code',
            'data' => 'Data',
            'description' => 'Description',
            'image' => 'Image',
            'name' => 'Name',
            'status' => 'Status',
            
        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'data' => 'Data',
            'email' => 'Email',
            'name' => 'Name',
            'phone' => 'Phone',
            'status' => 'Status',
            
        ],
    ],

    'location' => [
        'title' => 'Locations',

        'actions' => [
            'index' => 'Locations',
            'create' => 'New Location',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'data' => 'Data',
            'name' => 'Name',
            
        ],
    ],

    'staff' => [
        'title' => 'Staff',

        'actions' => [
            'index' => 'Staff',
            'create' => 'New Staff',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'data' => 'Data',
            'name' => 'Name',
            'phone' => 'Phone',
            'status' => 'Status',
            
        ],
    ],

    'booking' => [
        'title' => 'Bookings',

        'actions' => [
            'index' => 'Bookings',
            'create' => 'New Booking',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'customer_id' => 'Customer',
            'end_at' => 'End at',
            'location_id' => 'Location',
            'note' => 'Note',
            'service_id' => 'Service',
            'staff_id' => 'Staff',
            'start_at' => 'Start at',
            'status' => 'Status',
            
        ],
    ],

    'job' => [
        'title' => 'Jobs',

        'actions' => [
            'index' => 'Jobs',
            'create' => 'New Job',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'booking_id' => 'Booking',
            'charge' => 'Charge',
            'customer_id' => 'Customer',
            'data' => 'Data',
            'end_at' => 'End at',
            'location_id' => 'Location',
            'service_id' => 'Service',
            'staff_id' => 'Staff',
            'start_at' => 'Start at',
            'status' => 'Status',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];