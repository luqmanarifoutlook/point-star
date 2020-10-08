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

    public function getProduct($id)
    {
        $query = $this->db->query("SELECT * FROM product WHERE id = '" . $id . "'");
        return $query->num_rows() ? $query->row() : null;
    }

    public function getProductBySku($sku)
    {
        $query = $this->db->query("
            SELECT
                product.*,
                GROUP_CONCAT(category.name SEPARATOR ', ') AS category_name,
                (
                    SELECT name FROM category WHERE id_product = product.id LIMIT 1
                ) AS category_similar
            FROM product
            LEFT JOIN category ON category.id_product = product.id
            WHERE sku LIKE '" . $sku . "'
            GROUP BY product.id
        ");
        return $query->num_rows() ? $query->row() : null;
    }

    public function getProductByUrl($url)
    {
        $query = $this->db->query("SELECT * FROM product WHERE url LIKE '" . $url . "'");
        return $query->num_rows() ? $query->row() : null;
    }

    public function getPhotoByProduct($id_product)
    {
        $query = $this->db->query("SELECT * FROM photo WHERE id_product = '" . $id_product . "'");
        return $query->num_rows() ? $query->result() : null;
    }

    public function getColorByProduct($id_product)
    {
        $query = $this->db->query("SELECT * FROM color WHERE id_product = '" . $id_product . "'");
        return $query->num_rows() ? $query->result() : null;
    }

    public function getSpecificationByProduct($id_product)
    {
        $query = $this->db->query("SELECT * FROM specification WHERE id_product = '" . $id_product . "'");
        return $query->num_rows() ? $query->result() : null;
    }

    public function getLocationByProduct($id_product)
    {
        $query = $this->db->query("SELECT * FROM location WHERE id_product = '" . $id_product . "' ORDER BY name");
        return $query->num_rows() ? $query->result() : null;
    }

    public function getUpdated($id)
    {
        $query = $this->db->query("SELECT * FROM updated WHERE id = '" . $id . "'");
        return $query->num_rows() ? $query->row() : null;
    }

    public function listProduct()
    {
        $query = $this->db->query("
            SELECT
                product.*,
                (
                    SELECT url FROM photo WHERE product.id = photo.id_product LIMIT 1
                ) AS photo_url
            FROM product
            ORDER BY created DESC
        ");
        return $query->num_rows() ? $query->result() : null;
    }

    public function listProductByCategory($category_name, $id_product)
    {
        $query = $this->db->query("
            SELECT
                product.*,
                category.name AS category_name,
                (
                    SELECT url FROM photo WHERE product.id = photo.id_product LIMIT 1
                ) AS photo_url
            FROM category
            JOIN product ON category.id_product = product.id
            WHERE category.name = '$category_name'
            AND product.id != '$id_product'
            GROUP BY product.id
            ORDER BY created DESC
        ");
        return $query->num_rows() ? $query->result() : null;
    }

    public function listUpdated()
    {
        $query = $this->db->query("SELECT * FROM updated ORDER BY created DESC");
        return $query->num_rows() ? $query->result() : null;
    }

    public function listCategory()
    {
        $query = $this->db->query("SELECT DISTINCT(name) FROM category GROUP BY id_product, name ORDER BY name");
        return $query->num_rows() ? $query->result() : null;
    }

    public function listColor()
    {
        $query = $this->db->query("SELECT DISTINCT(code), label FROM color ORDER BY code");
        return $query->num_rows() ? $query->result() : null;
    }

    public function listLocation()
    {
        $query = $this->db->query("SELECT DISTINCT(name) FROM location ORDER BY name");
        return $query->num_rows() ? $query->result() : null;
    }

    public function setProduct($data)
    {
        if ($data['error']) {
            return null;
        }
        $data_product = array(
            'url'           => array_key_exists('url', $data) ? $data['url'] : null,
            'name'          => array_key_exists('name', $data) ? $data['name'] : null,
            'sku'           => array_key_exists('sku', $data) ? $data['sku'] : null,
            'description'   => array_key_exists('description', $data) ? $data['description'] : null,
            'price_current' => array_key_exists('price_current', $data) ? $data['price_current'] : null,
            'price_old'     => array_key_exists('price_old', $data) ? $data['price_old'] : null,
        );
        if ($this->db->insert('product', $data_product)) {
            $product = $this->getProduct($this->db->insert_id());
            if ((array_key_exists('categories', $data)) && (!is_null($data['categories']))) {
                foreach ($data['categories'] as $category) {
                    $data_category = array(
                        'id_product' => $product->id,
                        'name'       => $category,
                    );
                    $this->db->insert('category', $data_category);
                }
            }
            if ((array_key_exists('locations', $data)) && (!is_null($data['locations']))) {
                foreach ($data['locations'] as $location) {
                    $data_location = array(
                        'id_product' => $product->id,
                        'name'       => $location,
                    );
                    $this->db->insert('location', $data_location);
                }
            }
            if ((array_key_exists('photos', $data)) && (!is_null($data['photos']))) {
                foreach ($data['photos'] as $photo) {
                    $data_photo = array(
                        'id_product' => $product->id,
                        'url'        => $photo,
                    );
                    $this->db->insert('photo', $data_photo);
                }
            }
            if ((array_key_exists('specifications', $data)) && (!is_null($data['specifications']))) {
                foreach ($data['specifications'] as $specification) {
                    $data_specification = array(
                        'id_product' => $product->id,
                        'label'      => $specification['label'],
                        'point'      => $specification['point'],
                    );
                    $this->db->insert('specification', $data_specification);
                }
            }
            if ((array_key_exists('colors', $data)) && (!is_null($data['colors']))) {
                foreach ($data['colors'] as $color) {
                    $data_color = array(
                        'id_product' => $product->id,
                        'label'      => $color['label'],
                        'code'       => $color['code'],
                    );
                    $this->db->insert('color', $data_color);
                }
            }
            return $product;
        }
        return null;
    }
    public function updateProduct($data, $id_product)
    {
        $this->db->where('id', $id_product);
        $this->db->update('product', $data);
        return null;
    }
    public function setPrice($data)
    {
        if ($this->db->insert('updated', $data)) {
            return $this->getUpdated($this->db->insert_id());
        }
        return null;
    }
}
