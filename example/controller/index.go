package controller

import (
	"github.com/kainonly/iris-bit/traits"
)

type (
	Index struct {
		traits.Traits
	}
)

func NewIndex() *Index {
	var c Index
	c.M = "index"
	c.CURD(true, false, false, false, false, false)
	return &c
}
