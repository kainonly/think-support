package library

import (
	"github.com/kataras/iris"
)

func (c *Base) OriginListsOperateHandle() iris.Map {
	return iris.Map{"error": 1, "model": c.Model}
}
