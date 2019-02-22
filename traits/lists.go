package traits

import (
	"github.com/kataras/iris"
)

func (c *Traits) listsModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
