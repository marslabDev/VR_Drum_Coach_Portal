<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'assignment' => [
        'title'          => 'Assignment',
        'title_singular' => 'Assignment',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'student_efk'            => 'Student Efk',
            'student_efk_helper'     => ' ',
            'coach_efk'              => 'Coach Efk',
            'coach_efk_helper'       => ' ',
            'instructions'           => 'Instructions',
            'instructions_helper'    => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'created_by'             => 'Created By',
            'created_by_helper'      => ' ',
            'title'                  => 'Title',
            'title_helper'           => ' ',
            'start_at'               => 'Start At',
            'start_at_helper'        => ' ',
            'lesson_time_efk'        => 'Lesson Time Efk',
            'lesson_time_efk_helper' => ' ',
            'deadline'               => 'Deadline',
            'deadline_helper'        => ' ',
            'time_given'             => 'Time Given',
            'time_given_helper'      => ' ',
        ],
    ],
    'assignmentManagement' => [
        'title'          => 'Assignment Management',
        'title_singular' => 'Assignment Management',
    ],
    'submission' => [
        'title'          => 'Submission',
        'title_singular' => 'Submission',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'assignment'         => 'Assignment',
            'assignment_helper'  => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'student_efk'        => 'Student Efk',
            'student_efk_helper' => ' ',
        ],
    ],
    'attendence' => [
        'title'          => 'Attendence',
        'title_singular' => 'Attendence',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'student_efk'            => 'Student Efk',
            'student_efk_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'created_by'             => 'Created By',
            'created_by_helper'      => ' ',
            'lesson_time_efk'        => 'Lesson Time Efk',
            'lesson_time_efk_helper' => ' ',
            'attended_at'            => 'Attended At',
            'attended_at_helper'     => ' ',
            'leave_at'               => 'Leave At',
            'leave_at_helper'        => ' ',
        ],
    ],
    'attendenceManagement' => [
        'title'          => 'Attendence Management',
        'title_singular' => 'Attendence Management',
    ],
    'testing' => [
        'title'          => 'Testing',
        'title_singular' => 'Testing',
    ],
];
