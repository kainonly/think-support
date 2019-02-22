package traits

import (
	"github.com/kataras/iris"
)

func (c *Traits) addModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
