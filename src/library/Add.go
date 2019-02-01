package library

import (
	"github.com/kataras/iris"
)

func (c *Base) AddOperateHandler() iris.Map {
	return iris.Map{"error": 0}
}
