package controller

import "github.com/kainonly/iris-bit/traits"

type Admin struct {
	traits.Traits
}

func NewAdmin() *Admin {
	var c Admin
	c.M = "admin"
	c.CURD(true, false, false, false, false, false)
	return &c
}
