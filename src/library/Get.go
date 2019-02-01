package library

import (
	"github.com/kataras/iris"
)

func (c *Base) GetOperateHandle() iris.Map {
	return iris.Map{"error": 0, "model": c.Model}
}
