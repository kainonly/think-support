package traits

import (
	"github.com/kataras/iris"
)

func (c *Traits) getModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
