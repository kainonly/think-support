package traits

import (
	"github.com/kataras/iris"
)

func (c *Traits) deleteModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
