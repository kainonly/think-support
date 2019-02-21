package traits

import (
	"github.com/kataras/iris"
)

func (c *Traits) EditModel(ctx iris.Context) (int, error) {
	return ctx.JSON(iris.Map{})
}
