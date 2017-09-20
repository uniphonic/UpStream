<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;



function upstream_project_status( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'status' );
    return apply_filters( 'upstream_project_status', $result, $id );
}
function upstream_project_statuses_colors() {
    $option     = get_option( 'upstream_projects' );
    $colors     = wp_list_pluck( $option['statuses'], 'color', 'name' );
    return apply_filters( 'upstream_project_statuses_colors', $colors );
}
function upstream_project_status_color( $id = 0 ) {
    $status = upstream_project_status( $id );
    $colors = upstream_project_statuses_colors();
    $color  = isset( $colors[$status] ) ? $colors[$status] : '#aaaaaa';
    $result = array( 'status' => $status, 'color' => $color );
    return apply_filters( 'upstream_project_status_color', $result );
}
function upstream_project_status_type( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_project_status_type();
    return apply_filters( 'upstream_project_status_type', $result );
}

function upstream_project_progress( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'progress' );
    $result     = $result ? $result : '0';
    return apply_filters( 'upstream_project_progress', $result, $id );
}

function upstream_project_owner_id( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'owner' );
    return apply_filters( 'upstream_project_owner_id', $result, $id );
}

function upstream_project_owner_name( $id = 0, $show_email = false ) {
    $project    = new UpStream_Project( $id );
    $owner_id   = $project->get_meta( 'owner' );
    $result     = $owner_id ? upstream_users_name( $owner_id, $show_email ) : null;
    return apply_filters( 'upstream_project_owner_name', $result, $id, $show_email );
}

function upstream_project_client_id( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'client' );
    return apply_filters( 'upstream_project_client_id', $result, $id );
}

function upstream_project_client_name( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_client_name();
    return apply_filters( 'upstream_project_client_name', $result, $id );
}

function upstream_project_client_users( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = (array)$project->get_meta( 'client_users' );
    $result     = !empty($result) ? array_filter($result, 'is_numeric') : '';
    return apply_filters( 'upstream_project_client_users', $result, $id );
}

function upstream_project_members_ids( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'members' );
    return apply_filters( 'upstream_project_members_ids', $result, $id );
}
// only get WP users
function upstream_project_users( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'members' );
    $result     = isset( $result ) ? array_filter( $result , 'is_numeric' ) : '';
    return apply_filters( 'upstream_project_users', $result, $id );
}

function upstream_project_start_date( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'start' );
    return apply_filters( 'upstream_project_start_date', $result, $id );
}

function upstream_project_end_date( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'end' );
    return apply_filters( 'upstream_project_end_date', $result, $id );
}


function upstream_project_files( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'files' );
    return apply_filters( 'upstream_project_files', $result, $id );
}

function upstream_project_description($projectId = 0)
{
    $project = new UpStream_Project((int)$projectId);
    $result = $project->get_meta('description');

    return apply_filters('upstream_project_description', $result, $projectId);
}

function upstream_project_discussion( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'discussion' );
    return apply_filters( 'upstream_project_discussion', $result, $id );
}

/* ------------ MILESTONES -------------- */

function upstream_project_milestones( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'milestones' );
    return apply_filters( 'upstream_project_milestones', $result, $id );
}

function upstream_project_milestone_by_id( $id = 0, $milestone_id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_item_by_id( $milestone_id, 'milestones' );
    return apply_filters( 'upstream_project_milestone_by_id', $result, $id, $milestone_id );
}
function upstream_project_milestone_colors() {
    $option     = get_option( 'upstream_milestones' );
    $colors     = wp_list_pluck( $option['milestones'], 'color', 'title' );
    return apply_filters( 'upstream_project_milestone_colors', $colors );
}
/* ------------ TASKS -------------- */

function upstream_project_tasks( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'tasks' );
    return apply_filters( 'upstream_project_tasks', $result, $id );
}

function upstream_project_task_by_id( $id = 0, $task_id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_item_by_id( $task_id, 'tasks' );
    return apply_filters( 'upstream_project_task_by_id', $result, $id, $task_id );
}

function upstream_project_tasks_counts( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_statuses_counts( 'tasks' );
    return apply_filters( 'upstream_project_tasks_statuses_counts', $result, $id );
}

function upstream_project_task_statuses_colors() {
    $option     = get_option( 'upstream_tasks' );
    $colors     = wp_list_pluck( $option['statuses'], 'color', 'name' );
    return apply_filters( 'upstream_project_tasks_statuses_colors', $colors );
}
function upstream_project_task_status_color( $id = 0, $item_id ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_item_colors( $item_id, 'tasks', 'status' );
    return apply_filters( 'upstream_project_task_status_color', $result );
}

/* ------------ BUGS -------------- */

function upstream_project_bugs( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_meta( 'bugs' );
    return apply_filters( 'upstream_project_bugs', $result, $id );
}

function upstream_project_bug_by_id( $id = 0, $bug_id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_item_by_id( $bug_id, 'bugs' );
    return apply_filters( 'upstream_project_bug_by_id', $result, $id, $bug_id );
}

function upstream_project_bugs_counts( $id = 0 ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_statuses_counts( 'bugs' );
    return apply_filters( 'upstream_project_bugs_statuses_counts', $result, $id );
}

function upstream_project_bug_statuses_colors() {
    $option     = get_option( 'upstream_bugs' );
    $colors     = wp_list_pluck( $option['statuses'], 'color', 'name' );
    return apply_filters( 'upstream_project_bugs_statuses_colors', $colors );
}

function upstream_project_bug_severity_colors() {
    $option     = get_option( 'upstream_bugs' );
    $colors     = wp_list_pluck( $option['severities'], 'color', 'name' );
    return apply_filters( 'upstream_project_bugs_severity_colors', $colors );
}

function upstream_project_bug_status_color( $id = 0, $item_id ) {
    $project    = new UpStream_Project( $id );
    $result     = $project->get_item_colors( $item_id, 'bugs', 'status' );
    return apply_filters( 'upstream_project_bug_status_color', $result );
}


function upstream_project_item_by_id( $id = 0, $item_id = 0 ) {
    $project = new UpStream_Project( $id );
    $result = $project->get_item_by_id( $item_id, 'milestones' );
    if( ! $result )
        $result = $project->get_item_by_id( $item_id, 'tasks' );
    if( ! $result )
        $result = $project->get_item_by_id( $item_id, 'bugs' );
    if( ! $result )
        $result = $project->get_item_by_id( $item_id, 'files' );
    if( ! $result )
        $result = $project->get_item_by_id( $item_id, 'discussion' );
    return apply_filters( 'upstream_project_item_by_id', $result, $id, $item_id );
}

/* ------------ COUNTS -------------- */


/**
 * Get the count of items for a type.
 *
 * @param type | string type of item such as bug, task etc
 * @param id | int id of the project you want the count for
 */
function upstream_count_total( $type, $id = 0 ) {
    if( ! $id && is_admin() ) {
        $id = isset( $_GET['post'] ) ? $_GET['post'] : 'n/a';
    }

    $count = new Upstream_Counts( $id );
    return $count->total( $type );
}

/**
 * Get the count of OPEN items for a type.
 *
 * @param type | string type of item such as bug, task etc
 * @param id | int id of the project you want the count for
 */
function upstream_count_total_open( $type, $id = 0 ) {
    $count = new Upstream_Counts( $id );
    return $count->total_open( $type );
}

/**
 * Get the count of items for a type that is assigned to current user.
 *
 * @param type | string type of item such as bug, task etc
 * @param id | int id of the project you want the count for
 */
function upstream_count_assigned_to( $type, $id = 0 ) {
    $count = new Upstream_Counts( $id );
    return $count->assigned_to( $type );
}

/**
 * Get the count of OPEN items for a type that is assigned to current user.
 *
 * @param type | string type of item such as bug, task etc
 * @param id | int id of the project you want the count for
 */
function upstream_count_assigned_to_open( $type, $id = 0 ) {
    $count = new Upstream_Counts( $id );
    return $count->assigned_to_open( $type );
}

/**
 * Retrieve details from a given project.
 *
 * @since   1.12.0
 *
 * @param   int     $project_id The project ID.
 *
 * @return  object
 */
function getUpStreamProjectDetailsById($project_id)
{
    $post = get_post($project_id);
    if ($post instanceof \WP_Post) {
        global $wpdb;

        $project = new stdClass();
        $project->id = (int)$project_id;
        $project->title = $post->post_title;
        $project->description = "";
        $project->progress = 0;
        $project->status = null;
        $project->client_id = 0;
        $project->clientName = "";
        $project->owner_id = 0;
        $project->ownerName = "";
        $project->dateStart = 0;
        $project->dateEnd = 0;
        $project->members = array();
        $project->clientUsers = array();

        $metas = $wpdb->get_results(sprintf('
            SELECT `meta_key`, `meta_value`
            FROM `%s`
            WHERE `post_id` = "%s"
              AND `meta_key` LIKE "_upstream_project_%s"',
            $wpdb->prefix . 'postmeta',
            $project->id,
            "%"
        ));

        foreach ($metas as $meta) {
            if ($meta->meta_key === '_upstream_project_description') {
                $project->description = $meta->meta_value;
            } else if ($meta->meta_key === '_upstream_project_progress') {
                $project->progress = (int)$meta->meta_value;
            } else if ($meta->meta_key === '_upstream_project_status') {
                $project->status = $meta->meta_value;
            } else if ($meta->meta_key === '_upstream_project_client') {
                $project->client_id = (int)$meta->meta_value;
            } else if ($meta->meta_key === '_upstream_project_owner') {
                $project->owner_id = (int)$meta->meta_value;
            } else if ($meta->meta_key === '_upstream_project_start') {
                $project->dateStart = (int)$meta->meta_value;
            } else if ($meta->meta_key === '_upstream_project_end') {
                $project->dateEnd = (int)$meta->meta_value;
            } else if ($meta->meta_key === '_upstream_project_members') {
                $project->members = (array)maybe_unserialize($meta->meta_value);
            } else if ($meta->meta_key === '_upstream_project_client_users') {
                $project->clientUsers = (array)maybe_unserialize($meta->meta_value);
            }
        }

        $usersRowset = $wpdb->get_results(sprintf('
            SELECT `ID`, `display_name`
              FROM `%s`',
            $wpdb->prefix . 'users'
        ));

        $users = array();
        foreach ($usersRowset as $user) {
            $users[(int)$user->ID] = (object)array(
                'id'   => (int)$user->ID,
                'name' => $user->display_name
            );
        }

        if ($project->client_id > 0) {
            $client = get_post($project->client_id);
            if ($client instanceof \WP_Post) {
                if (!empty($client->post_title)) {
                    $project->clientName = $client->post_title;
                }
            }
        }

        if ($project->owner_id > 0 && isset($users[$project->owner_id])) {
            $project->ownerName = $users[$project->owner_id]->name;
        }

        if (count($project->members) > 0) {
            foreach ($project->members as $memberIndex => $member_id) {
                $member_id = (int)$member_id;
                if ($member_id > 0 && isset($users[$member_id])) {
                    $project->members[$memberIndex] = $users[$member_id];
                }
            }
        }

        if (count($project->clientUsers) > 0) {
            foreach ($project->clientUsers as $clientUserIndex => $clientUser_id) {
                $clientUser_id = (int)$clientUser_id;
                if ($clientUser_id > 0 && isset($users[$clientUser_id])) {
                    $project->clientUsers[$clientUserIndex] = $users[$clientUser_id];
                }
            }
        }

        return $project;
    }

    return false;
}

function countItemsForUserOnProject($itemType, $user_id, $project_id)
{
    $user_id = (int)$user_id;
    if (!in_array($itemType, array('milestones', 'tasks', 'bugs'))) {
        return null;
    }

    $count = 0;

    $metas = (array)get_post_meta((int)$project_id, '_upstream_project_' . $itemType);
    $metas = count($metas) > 0 ? (array)$metas[0] : array();

    if (isset($metas[0])) {
        $metas = (array)$metas[0];
    }

    if (is_array($metas) && count($metas) > 0) {
        foreach ($metas as $meta) {
            if (isset($meta['assigned_to']) && (int)$meta['assigned_to'] === $user_id) {
                $count++;
            }
        }
    }

    return $count;
}

/**
 * Retrieve all comments from a project.
 *
 * @since   @todo
 *
 * @param   int     $project_id     The project ID.
 *
 * @return  array
 */
function getProjectComments($project_id)
{
    $project_id = (int)$project_id;
    $project = get_post($project_id);
    if ($project === false) {
        return array();
    }

    $meta = get_post_meta(get_the_ID(), '_upstream_project_discussion');
    $meta = !empty($meta) ? $meta[0] : $meta;

    $comments = array();

    if (count($meta) > 0) {
        global $wpdb, $wp_embed;

        $usersRowset = $wpdb->get_results('
            SELECT `ID`, `display_name`
            FROM `'. $wpdb->prefix .'users`'
        );

        $users = array();
        foreach ($usersRowset as $user) {
            $users[(int)$user->ID] = (object)array(
                'id'     => (int)$user->ID,
                'name'   => $user->display_name,
                'avatar' => getUserAvatarURL($user->ID)
            );
        }

        $dateFormat = get_option('date_format');
        $timeFormat = get_option('time_format');
        $currentTimezone = new DateTimeZone(get_option('timezone_string'));
        $currentTimestamp = time();

        $user = wp_get_current_user();
        $user->ID = (int)$user->ID;

        if (
            (int)upstream_project_owner_id() === $user->ID ||
            in_array((array)$user->roles, array('administrator', 'upstream_manager')) ||
            current_user_can('delete_project_discussion')
        ) {
            $currentUserCanDeleteComments = true;
        } else {
            $currentUserCanDeleteComments = false;
        }

        foreach ($meta as $commentData) {
            $commentData['created_by'] = $users[(int)$commentData['created_by']];
            if ($commentData['created_by']->id === $user->ID) {
                $commentData['userCanDelete'] = true;
            } else {
                $commentData['userCanDelete'] = $currentUserCanDeleteComments;
            }

            $date = new DateTime();
            $date->setTimestamp($commentData['created_time']);
            $date->setTimezone($currentTimezone);

            $created_time = (int)$commentData['created_time'];
            unset($commentData['created_time']);

            $commentData['created_at'] = (object)array(
                'timestamp' => $created_time,
                'formatted' => $date->format($dateFormat . ' ' . $timeFormat),
                'human'     => sprintf(
                    _x('%s ago', '%s = human-readable time difference', 'upstream'),
                    human_time_diff($created_time, $currentTimestamp)
                ),
                'iso_8601'  => date('c', $created_time)
            );

            $commentData['comment'] = $wp_embed->autoembed(wpautop($commentData['comment']));

            array_push($comments, (object)$commentData);
        }
    }

    return $comments;
}
