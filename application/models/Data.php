<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Model
{
    public function registerCheck($email)
    {
        $query = $this->db->query("SELECT * FROM users WHERE email = '" . $email . "'");
        return $query->num_rows() ? false : true;
    }

    public function registerSet($name, $email, $password)
    {
        $data = array(
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
            'avatar'   => 'default.jpg',
            'bio'      => 'Welcome to my profile!',
        );
        if ($this->db->insert('users', $data)) {
            return $this->userGet($this->db->insert_id());
        }
        return null;
    }

    public function loginCheck($email, $password)
    {
        $query = $this->db->query("SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'");
        return $query->num_rows() ? $query->row() : null;
    }

    public function userGet($id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE id = '" . $id . "'");
        return $query->num_rows() ? $query->row() : null;
    }

    public function userList($id, $limit = null)
    {
        $limit = !is_null($limit) ? "LIMIT " . $limit : "";
        $query = $this->db->query("
            SELECT
                users.id,
                users.name,
                users.bio,
                users.avatar,
                users.id,
                COUNT(relation.id) AS friends,
                COUNT(comments.id) AS comments,
                (
                    SELECT id
                    FROM relation
                    WHERE (id_user = '$id' AND id_friend = users.id)
                    OR (id_user = users.id AND id_friend = '$id')
                ) AS relate
            FROM users
            LEFT JOIN relation ON (relation.id_user = users.id) OR (relation.id_friend = users.id)
            LEFT JOIN comments ON comments.id_friend = users.id
            GROUP BY users.id
            ORDER BY
                friends DESC,
                comments DESC
            $limit
        ");
        return $query->num_rows() ? $query->result() : null;
    }

    public function userUpdate($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return $this->userGet($id);
    }

    public function commentGet($id)
    {
        $query = $this->db->query("SELECT * FROM comments WHERE id = '" . $id . "'");
        return $query->num_rows() ? $query->row() : null;
    }

    public function commentList($id)
    {
        $query = $this->db->query("
            SELECT
                comments.created,
                comments.message,
                users.id,
                users.name,
                users.avatar
            FROM comments
            JOIN users ON comments.id_user = users.id
            WHERE comments.id_friend = '$id'
        ");
        return $query->num_rows() ? $query->result() : null;
    }

    public function commentSet($id_user, $id_friend, $message)
    {
        $data = array(
            'id_user'   => $id_user,
            'id_friend' => $id_friend,
            'message'   => $message,
        );
        if ($this->db->insert('comments', $data)) {
            return $this->commentGet($this->db->insert_id());
        }
        return null;
    }

    public function friendCheck($user, $friend)
    {
        $query = $this->db->query("SELECT * FROM relation WHERE ((id_user = '$user') AND (id_friend = '$friend')) OR ((id_user = '$friend') AND (id_friend = '$user'))");
        return $query->num_rows() ? true : false;
    }

    public function friendList($id)
    {
        $query = $this->db->query("
            SELECT
                relation.id,
                users.id,
                users.name,
                users.bio,
                users.avatar,
                (
                    SELECT COUNT(*)
                    FROM relation
                    WHERE id_user = users.id OR id_friend = users.id
                ) AS friends,
                COUNT(comments.id) AS comments,
                (
                    SELECT id
                    FROM relation
                    WHERE (id_user = '$id' AND id_friend = users.id)
                    OR (id_user = users.id AND id_friend = '$id')
                ) AS relate
            FROM relation
            JOIN users ON (relation.id_user = users.id) OR (relation.id_friend = users.id)
            LEFT JOIN comments ON comments.id_friend = users.id
            WHERE
                ((relation.id_user = '$id') OR (relation.id_friend = '$id'))
                AND users.id != '$id'
            GROUP BY users.id
        ");
        return $query->num_rows() ? $query->result() : null;
    }

    public function friendSet($user, $friend)
    {
        $data = array(
            'id_user'   => $user,
            'id_friend' => $friend,
        );
        if ($this->db->insert('relation', $data)) {
            return $friend;
        }
        return null;
    }
}
